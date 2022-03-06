<!DOCTYPE html>
<html>
<?php
include_once(TEMPLATE_ROOT . '/defaults/head.php');
?>

<body>

<div class="container">
    <?php
    include_once (TEMPLATE_ROOT .'/defaults/header.php');
    include_once (TEMPLATE_ROOT .'/defaults/menu.php');
    include_once (TEMPLATE_ROOT .'/defaults/pictures.php');
    ?>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item"><a href="/categories">Categories/</a></li
            <li class="breadcrumb-item"><a href="/admin/create">Upload een aparaat</a></li
        </ol>
    </nav>
    <div class="row gy-3 ">

        <?php
        global $products;
        /*var_dump($products);*/
        ?>
        <div class="container">
            <div class="cart mt-5">
                <div class="card-header">
                    <h2>CRUD System</h2>
                </div>
                <div class="cart-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <th>Picture</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Edit</th>
                        </tr>
                        <?php foreach($products as $product): ?>
                        <tr>
                            <td><?=$product->id?></td>
                            <td><a href="/product/">
                                    <img src="/<?= $product->picture ?>" alt="<?php $product->name ?>" width="50" height="50" />
                                </a></td>
                            <td><?= $product->name ?></td>
                            <td><?= $product->category_name ?></td>
                            <td>
                                <a href="edit.php?id=<?= $product->id ?>" class="btn btn-info">Edit</a>
                                <a onclick="return confirm('Are you sure that you want to delete this entry?')" href="/admin/product/<?= $product->id ?>/delete" class="btn btn-danger">Delete</a>
                                <!--<a href="/admin/create" class="btn btn-success">Add</a>-->
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <a type="button" class="btn btn-success btn-sm px-3" href="/admin/create">
                            <i class="bi bi-plus-square"></i>Create
                        </a>
                    </table>
                </div>
            </div>
        </div>
    </div>





    <hr>
    <?php
    include_once (TEMPLATE_ROOT .'/defaults/footer.php');

    ?>
</div>

</body>
</html>
