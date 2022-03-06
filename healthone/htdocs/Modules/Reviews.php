<?php

function insertReview($name, $email, $comment, $productId) {
    try {
        if (isset($_SESSION['logIn']) && $_SESSION['logIn'] == true) {
            global $pdo;
            $query = $pdo->prepare("INSERT INTO review(name, email, comment, product_id) VALUES (:name, :email, :comment, :product_id)");
            $query->bindParam('name', $name, PDO::PARAM_STR);
            $query->bindParam('email', $email,PDO::PARAM_STR);
            $query->bindParam('comment', $comment,PDO::PARAM_STR);
            $query->bindParam('product_id', $productId,PDO::PARAM_INT);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            /*return $result;*/
        }

    }catch (PDOException $e) {
        echo $e->getMessage();
    }


    if (!$result) {
        echo "<script>alert('Comment added successfully.')</script>";
    }else {
        echo "<script>alert('Comment does not add.')</script>";
    }
}

