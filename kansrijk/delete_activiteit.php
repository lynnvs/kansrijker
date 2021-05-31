<?php

if(isset($_GET['activiteit_actiecode'])){
    include "database.php";
    $db = new database();

    $sql = "DELETE FROM activiteit WHERE actiecode = :actiecode";
    $placeholders = ['actiecode'=>$_GET['activiteit_actiecode']];

    $db->update_or_delete($sql, $placeholders);
    header('location:activiteit.php');
}

?>