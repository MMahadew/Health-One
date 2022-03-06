<!DOCTYPE html>
<html>
<?php
include_once('defaults/head.php');
?>
<body>
<div class="container">
    <?php
    include_once ('defaults/header.php');
    include_once ('defaults/menu.php');
    include_once ('defaults/pictures.php');
    include_once ('defaults/errorMessage.php');
    ?>

    <h4>Sportcenter HealthOne</h4>
    <h5>Vul uw login gegevens in</h5>
    <form method="post">
        <div class="mb-3">
            <label for="example1" class="form-label">Email address</label>
            <input type="text" class="form-control" name="email" id="example1">
        </div>
        <div class="mb-3">
            <label for="example2" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="example2">
        </div>
        <button type="submit" name="login" class="btn btn-primary">Submit</button>
    </form>
    <hr>
    <?php
    include_once ('defaults/footer.php');
    ?>

    <?php
    global $pdo;
    $email = "";
    $password = "";
    $login = "";

    if(isset($_POST["login"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];

        echo "Je email is: " . $email . "<br>";
        echo "Je wachtwoord is: " . $password . "<br>";

        $query = $pdo->prepare("SELECT * FROM account WHERE email = ? AND Password = ?");
        $query->bindParam(1, $email, PDO::PARAM_STR, 36);
        $query->bindParam(2, $password, PDO::PARAM_STR, 20 );
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        /*print_r($result);*/

        if (count($result) >= 1) {
            $_SESSION['user'] = $result;
            print_r($_SESSION['user']);
        }else {
            print "Gebruikersnaam of wachtwoord is onjuist";
        }


    }
    ?>
</div>
</body>
</html>

