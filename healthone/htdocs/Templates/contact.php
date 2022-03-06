<!DOCTYPE html>
<html>
<?php
include_once('defaults/head.php');
?>
<body>
<div class="container">
    <?php
    include_once('defaults/header.php');
    include_once('defaults/menu.php');
    include_once('defaults/pictures.php');
    ?>
    <h2>Vul uw contact gegevens in</h2>
    <div id="right">
        <img src="../public/img/openingstijden.webp" alt="openingstijden" width="400px" height="400px">
    </div>
    <div class="form-container">
        <form name="frmContact" id="" frmContact
        "" method="post"
        action="" enctype="multipart/form-data"
        onsubmit="return validateContactForm()">

        <div class="input-row">
            <label style="padding-top: 20px;">Name</label> <span
                    id="userName-info" class="info"></span><br/>

            <input type="text" class="input-field" name="userName" id="userName"/>
        </div>
        <div class="input-row">
            <label>Email</label> <span id="userEmail-info" class="info"></span><br/>

            <input type="text" class="input-field" name="userEmail" id="userEmail"/>
        </div>
        <div class="input-row">
            <label>Subject</label> <span id="subject-info" class="info"></span><br/>
            <input type="text" class="input-field" name="subject" id="subject"/>
        </div>
        <div class="input-row">
            <label>Message</label> <span id="userMessage-info" class="info"></span><br/>
            <textarea name="content" id="content" class="input-field" cols="60" rows="6"></textarea>
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
    $userName = '';
    $userEmail = '';
    $subject = '';
    $content = '';

    if (isset($_POST['send'])) {
        $userName = $_POST['userName'];
        $userEmail = $_POST['userEmail'];
        $subject = $_POST['subject'];
        $content = $_POST['content'];

        echo "Het formulier is verzonden!<br>";
        echo "Naam: " . $userName . "<br>";
        echo "Email: " . $userEmail . "<br>";
        echo "Subject: " . $subject . "<br>";
        echo "Content: " . $content . "<br>";

        global $pdo;
        $query = $pdo->prepare("INSERT INTO contact(name, subject, email, bericht)
            VALUES('$userName', '$userEmail', '$subject', '$content')");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
    }
    ?>

    <?php
    include_once('defaults/footer.php');
    ?>
</div>
</body>
</html>
