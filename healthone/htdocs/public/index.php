<?php
require '../Modules/Categories.php';
require '../Modules/Products.php';
require '../Modules/Database.php';
require '../Modules/Registreren.php';
require '../Modules/Users.php';
require_once '../Modules/Reviews.php';

define("DOC_ROOT", realpath(dirname(__DIR__)));
define("TEMPLATE_ROOT", realpath(DOC_ROOT . "/Templates"));

$request = $_SERVER['REQUEST_URI'];
$params = explode("/", $request);
$title = "HealthOne";
$titleSuffix = "";
session_start();

switch ($params[1]) {
    case 'categories':
        if (isset($params[2])) {
            $categoryId = (int)$params[2];
            $products = getProducts($categoryId);
            $name = getCategoryName($categoryId);
            include_once "../Templates/products.php";
        }else {
            $categories=getCategories();
            include_once "../Templates/categories.php";
        }

        break;
    case 'product':
        if (isset($params[2])) {
            $productId = (int)$params[2];
            $products = getProduct($productId);
            $name = getCategoryName($products->categories_id);
            $titleSuffix = ' | ' . $name;
            /*$reviews = getReviews($productId);*/

            if (isset($_POST['submit'])) {
                $nameCommenter = $_POST['name'];
                $email = $_POST['email'];
                $comment = $_POST['comment'];
                insertReview($nameCommenter, $email, $comment, $productId);
            }
            $titleSuffix = ' | InfoPage';
            include_once "../Templates/infoPage.php";
        } else {
            $titleSuffix = ' | Home';
            include_once "../Templates/home.php";
        }
        break;
    case 'registreren':
        $titleSuffix = ' | Registreren';

        if(isset($_POST['userFirstName'])){
            createAccount($_POST);
        }
        include_once "../Templates/registreren.php";
        break;
    case 'contact':
        $titleSuffix = ' | Contact';
        if(isset($_POST['createContact'])){
            contact($_POST['createContact']);
        }
        include_once "../Templates/contact.php";
        break;
    /*case 'description':
        $titleSuffix = ' | description';
        include_once "../Templates/description.php";
        break;*/
    case 'logIn':
        $titleSuffix = ' | logIn';

        if (isset($_POST['login'])) {
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $password = filter_input(INPUT_POST, 'password');
            $user = checkLogin($email, $password);
            if ($user == false) {
                $error['title'] = "Incorrect!";
                $error['message'] = "Incorrect credentials!";
            }
            else {
                $_SESSION['logIn'] = true;
                $_SESSION['role'] = $user->role;
                $_SESSION['email'] = $user->email;
                $_SESSION['name'] = "$user->first_name $user->last_name";

                if ($user->role == 'admin') {
                    header("Location: /admin");
                    return;
                }
                header("Location: /home");
            }
        }

        include_once "../Templates/logIn.php";
        break;
    case 'logOut':
        session_destroy();
        header("location: /");
        break;
    case 'admin':
        include_once 'admin.php';
        break;
    default:
        $titleSuffix = ' | Home';
        include_once "../Templates/home.php";
}

function getTitle() {
    global $title, $titleSuffix;
    return $title . $titleSuffix;
}
