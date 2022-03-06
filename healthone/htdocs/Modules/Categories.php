<?php
include_once ("Database.php");
// TODO Zorg dat de methodes goed ingevuld worden met de juiste queries.
function getCategories():array
{
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM categories");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_CLASS,'Category');
    return $result;

}

function getCategoryName(int $id):string
{
    global $pdo;
    $sth = $pdo->prepare("SELECT * FROM categories WHERE id= ? ");
    $sth->bindParam(1, $id, PDO::PARAM_INT);
    $sth->setFetchMode(PDO::FETCH_CLASS, Category::class);
    $sth->execute();
    $category = $sth->fetch();
    return $category->name;

}
