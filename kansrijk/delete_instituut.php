<?php

if(isset($_GET['instituut_instituutcode'])){
    include "database.php";
    $db = new database();

    $sql = "DELETE FROM instituut WHERE instituutcode = :instituutcode";
    $placeholders = ['instituutcode'=>$_GET['instituut_instituutcode']];

    $db->update_or_delete($sql, $placeholders);
    header('location:overzicht_instituut.php');
}

?>