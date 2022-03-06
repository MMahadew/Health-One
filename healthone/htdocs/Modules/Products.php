<?php
// TODO Zorg dat de methodes goed ingevuld worden met de juiste queries.
function getProducts(int $categoryId): array
{
    global $pdo;
    $sth = $pdo->prepare("SELECT * FROM product WHERE categories_id=?");
    $sth->bindParam(1, $categoryId);
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_CLASS, 'Product');

}

function getProduct( int $productId): Product
{
        global $pdo;
        $query = $pdo->prepare("SELECT product.id, product.name, product.picture, product.description, product.categories_id, categories.name AS category_name
                                        FROM product
                                        LEFT JOIN categories
                                        ON product.categories_id = categories.id
                                        WHERE product.id = ?");
        $query->bindParam(1, $productId);
        $query->setFetchMode(PDO::FETCH_CLASS, 'Product');
        $query->execute();
        return $query->fetch();

}
function getAllProducts():array
{
    global $pdo;
    $sth = $pdo->prepare("SELECT product.id, product.name, product.picture, product.description, product.categories_id, categories.name AS category_name
                                        FROM product
                                        LEFT JOIN categories
                                        ON product.categories_id = categories.id ORDER BY categories_id");
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_CLASS, 'Product');
}

function isPost()
{
    if( (isset($_POST['name'])) && (!empty($_POST['name'])) &&
        (isset($_POST['category'])) && (!empty($_POST['category'])) &&
        (isset($_POST['description'])) && (!empty($_POST['description'])) &&
        (isset($_FILES['fileToUpload']['tmp_name'])) && (!empty($_FILES['fileToUpload']['tmp_name'])) )
    {
        return true;
    } else
        return false;
}

function fileupload()
{
   global $message;


   $allowed = ['gif', 'png', 'jpg'];
   $filename = $_FILES['fileToUpload']['name']; //original filename//
   $ext = pathinfo($filename, PATHINFO_EXTENSION);
   if (!in_array($ext,$allowed) || exif_imagetype($_FILES['fileToUpload']['tmp_name']) === false) {
       $message = "Sorry alleen gif, png of jpg files toegestaan";
       var_dump("1");
       return false;
   }
   $target_dir = "./img/categories/". strtolower(getCategoryName((int)$_POST['category'])) ."/";
   var_dump($target_dir);
   $target_file = $_FILES["fileToUpload"]["name"];
   do {
       $target_file = $target_dir.md5($target_file).".$ext";
   } while (file_exists($target_file));

   //Check file size
    var_dump($_FILES["fileToUpload"]["size"]);
   if ($_FILES["fileToUpload"]["size"] > 800000) {
       $message = "Sorry, je bestand is te groot.";
       var_dump("2");
       return false;
   }

   //Als alles goed is, probeer het te uploaden
   if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

       global $pdo;
       try {
           var_dump("Test");
           // query to insert the submitted data
           $sql = $pdo->prepare("INSERT INTO product (name,picture,description,categories_id) VALUES (?, ?,?,?)");
           $sql->bindParam(1, $_POST['name'], PDO::PARAM_STR);
           $sql->bindParam(2, $target_file, PDO::PARAM_STR);
           $sql->bindParam(3, $_POST['description'], PDO::PARAM_STR);
           $sql->bindParam(4,$_POST['category'],PDO::PARAM_INT);
           // function to execute above query
           $sql->execute();
       } catch (PDOException $e) {
           echo $e->getMessage();
       }
       return true;
   } else {
       $message = "Sorry, er was een probleempje bij het uploaden van je file";
       var_dump("3");
       return false;
   }

}

function deleteProduct(int $id)  {
    global $pdo;
    $sth = $pdo->prepare("DELETE FROM product WHERE id = ?");
    $sth->bindParam(1, $id);
    $sth->execute();
}
