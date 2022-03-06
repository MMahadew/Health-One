<?php
global $error;
?>

<?php if (isset($error)): ?>
<div class="alert alert-danger">
    <strong><?= $error['title'] ?></strong> <?= $error['message'] ?>
</div>
<?php endif; ?>