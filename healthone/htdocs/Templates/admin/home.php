<!DOCTYPE html>
<html>
<?php
include_once(TEMPLATE_ROOT .'/defaults/head.php');
global $user;
?>
<body>
<div class="container">
    <?php
    include_once (TEMPLATE_ROOT .'/defaults/header.php');
    include_once (TEMPLATE_ROOT .'/defaults/menu.php');
    include_once (TEMPLATE_ROOT .'/defaults/pictures.php');
    ?>

    <h4>Welcome <?= $_SESSION['name'] ?? "Admin" ?></h4>

    <hr>
    <?php


    include_once (TEMPLATE_ROOT .'/defaults/footer.php');
    ?>
</div>
</body>
</html>

