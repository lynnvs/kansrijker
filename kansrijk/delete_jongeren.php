<?php

if(isset($_GET['jongere_jongerecode'])){
    include "database.php";
    $db = new database();

    $sql = "DELETE FROM jongere WHERE jongerecode = :jongerecode";
    $placeholders = ['jongerecode'=>$_GET['jongere_jongerecode']];

    $db->update_or_delete($sql, $placeholders);
    header('location:jongeren.php');
}

?>