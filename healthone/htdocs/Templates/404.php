<!DOCTYPE html>
<html>
<?php
include_once(TEMPLATE_ROOT .'/defaults/head.php');
?>
<body>
<div class="container">
    <?php
    include_once (TEMPLATE_ROOT .'/defaults/header.php');
    include_once (TEMPLATE_ROOT .'/defaults/menu.php');
    include_once (TEMPLATE_ROOT .'/defaults/pictures.php');
    ?>

    <?php
    echo "404 NOT FOUND!". "<br>";

    echo "The page that you are trying to acces does not excits!";
    ?>
    <hr>
    <?php
    print_r($_SESSION['user']);

    include_once (TEMPLATE_ROOT .'/defaults/footer.php');
    ?>
</div>
</body>
</html>
