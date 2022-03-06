<?php

global $params;
global $message;
//check if the user is admin
if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
    if (isset($params[2])) {
        switch ($params[2]) {
            case 'product':
                if (isset($params[3]) && isset($params[4])) {
                    if ($params[4] == "delete") {
                        $productId = $params[3];
                        $delete = $params[4];
                        if ($delete) {
                            deleteProduct($productId);
                        }
                    }
                }
                $products = getAllProducts();
                include_once '../Templates/admin/products.php';
                break;
            case 'create':
                if (isPost()) {
                    if (fileupload()) {

                        /*saveProduct($_POST['name'], $_POST['category'], $_POST['description'], $message);*/
                        include_once "../Templates/admin/create.php";
                        /*header("Location: /Templates/admin/product.php");*/
                    }else {
                        $categories = getCategories();
                        include_once "../Templates/admin/create.php";
                    }
                } else {
                    $categories = getCategories();
                    include_once "../Templates/admin/create.php";
                }
                /*include_once '../Templates/admin/create.php';*/
                break;
            default:
                include_once  '../Templates/admin/home.php';
                break;
        }
    }else {
    include_once  '../Templates/admin/home.php';
    }

}else {
    //if not admin
    include_once '../Templates/404.php';
}


