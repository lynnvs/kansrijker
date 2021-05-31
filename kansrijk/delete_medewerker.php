<?php

if(isset($_GET['account_id'])){
    include "database.php";
    $db = new database();

    $sql = "DELETE FROM account WHERE id = :id";
    $placeholders = ['id'=>$_GET['account_id']];

    $db->update_or_delete($sql, $placeholders);
    header('location:medewerker.php');
}

?>