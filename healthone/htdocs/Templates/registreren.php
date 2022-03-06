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
    ?>
    <h2>Registreer u hieronder</h2>
    <div id="right">
        <img src="../public/img/registreren.jpg" class="registreren" alt="registreren">
    </div>

    <div class="form-container">
        <form name="frmContact" id="" frmContact
        "" method="post"
        action="" enctype="multipart/form-data"
        onsubmit="return validateContactForm()">

        <div class="input-row">
            <label style="padding-top: 20px;">First-name</label> <span id="userName-info" class="info"></span><br/>

            <input type="text" class="input-field" name="userFirstName" id="userFirstName"/>
        </div>
        <div class="input-row">
            <label>Last-name</label> <span id="userName-info" class="info"></span><br/>

            <input type="text" class="input-field" name="userLastName" id="userLastName"/>
        </div>
        <div class="input-row">
            <label>Email</label> <span id="userEmail-info" class="info"></span><br/>

            <input type="text" class="input-field" name="userEmail" id="userEmail"/>
        </div>
        <div class="input-row">
            <label>Password</label> <span id="subject-info" class="info"></span><br/>
            <input type="text" class="input-field" name="Password" id="Password"/>
        </div>
        <div class="input-row">
            <label>Repeat Password</label> <span id="subject-info" class="info"></span><br/>
            <input type="text" class="input-field" name="repeatPassword" id="repeatPassword"/>
        </div>

        <div>
            <input type="submit" name="send" class="btn-submit" value="Send"/>

            <div id="statusMessage">
                <?php
                if (!empty($message)) {
                    ?>
                    <p class='<?php echo $type; ?>Message'><?php echo $message; ?></p>
                    <?php
                }
                ?>
            </div>
        </div>
        </form>
    </div>
    <?php

    ?>
    <?php
    include_once ('defaults/footer.php');
    ?>
</div>
</body>
</html>
