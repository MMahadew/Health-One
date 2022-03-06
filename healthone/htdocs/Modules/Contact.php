<?php

function contact($createContact) {
    global $pdo;
    $sql = "INSERT INTO user (Name, Email, Subject, Message) VALUES (?,?,?,?)";
    $insertData= $pdo->prepare($sql);
    $insertData->execute([$createContact['userName'], $createContact['userEmail'], $createContact['subject'], $createContact['content']]);
    //$insertData->execute([$createContact['name'], $createContact['subject'], $createContact['email'], /*$content*/]);
    $result = $insertData->fetchAll(PDO::FETCH_ASSOC);
    return $result;

    print_r(contact($result));
    //return $createContact;
}

?>
