<!DOCTYPE html>
<!-- ====================================
Web Name: English Language PPDK
Author: Nadia Adibah bt Rajab
====================================== -->
<?php
session_start();
    $user = $_SESSION['user'];
    if(!$_SESSION['user']){
        session_destroy();
        header('Location: ../index.php?status=error');
        exit();
    }

include "../database.php";

$tid=$_GET['del'];

$sql = $conn->prepare("DELETE FROM teacher WHERE tid= ?");
$sql->execute([$tid]);

header("Location: englishportal.php?status=deleted");

?>