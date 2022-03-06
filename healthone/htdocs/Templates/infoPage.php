<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/css/style2.css"/>
</head>
<?php
include_once('defaults/head.php');
?>
<body>
    <div class="container">
    <?php
    include_once ('defaults/header.php');
    include_once ('defaults/menu.php');
    include_once ('defaults/pictures.php');
    ?>
<?php
global $products;
/*var_dump($products);*/
?>
<?php /*foreach($products as &$product): */?>

    <div class="col-sm-4 col-md-3 col-lg-2">
        <div class="card">
            <div class="card-body text-center">
                <?/*=$product['id']*/?><!--">-->
                    <img class="product-img img-responsive center-block" src="/<?= $products->picture ?>" />
                <div class="card-title mb-3"><?= $products->name ?></div>
                <div class="card-title mb-3"><?= $products->description ?></div>
            </div>
        </div>
    </div>
<?php /*endforeach; */?>

    <div class="wrapper">
        <?php
        if (isset($_SESSION['logIn']) && $_SESSION['logIn'] == true): ?>

            <form method="post" action="/product/<?php echo $productId?>" class="form">
                <div class="row">
                    <div class="input-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" placeholder="Enter your Name" required>
                    </div>
                    <div class="input-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" placeholder="Enter your Email" required>
                    </div>
                </div>
                <div class="input-group textarea">
                    <label for="comment">Comment</label>
                    <textarea id="comment" name="comment" placeholder="Enter your Comment" required></textarea>
                </div>
                <div class="input-group">
                    <button name="submit" class="btn">Post Comment</button>
                </div>
            </form>

        <?php endif; ?>


        <div class="prev-comments">
            <?php
            global $pdo;
            $stmt = $pdo->prepare("SELECT name, email, comment, product_id FROM review WHERE product_id = ?");
            $stmt->bindParam(1, $productId);
            $stmt->execute();
            $review = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($review as $showReview) {

            ?>

            <div class="single-item">
                <h4><?php echo $showReview['name'] . "<br>"; ?></h4>
                <a href="mailto:<?php echo $showReview['email'] . "<br>"; ?>"><?php echo $showReview['email']; ?></a>
                <p><?php echo $showReview['comment'] . $showReview['product_id'] . "<br>"; ?></p>
            </div>
            <?php
            }
            ?>
            <!--?>-->
        </div>
    </div>

<?php
include_once('defaults/footer.php');
?>
    </div>

</body>
</html>

<?php

?>
