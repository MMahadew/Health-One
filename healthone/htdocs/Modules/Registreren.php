<?php

function createAccount($newAccount)
{
    global $pdo;
    $sql = "INSERT INTO user (email, password, first_name, last_name) VALUES (?,?,?,?)";
    $insertData= $pdo->prepare($sql);
    $insertData->execute([$newAccount['userEmail'], $newAccount['Password'], $newAccount['userFirstName'], $newAccount['userLastName']]);
    /*print_r($newAccount);*/
    return $newAccount;

}