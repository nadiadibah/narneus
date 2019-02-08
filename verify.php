<!DOCTYPE html>
<!-- ====================================
Web Name: English Language PPDK
Author: Nadia Adibah bt Rajab
====================================== -->
<?php
include "database.php";

if(isset($_POST["submit"])){   
    
    $user=$_POST['username'];
    $pass=md5($_POST['password']);

    $login = $conn->prepare("SELECT * FROM users WHERE username=:user AND password=:pass");
 	$login->bindParam(':user', $_POST['username']);
    $login->bindParam(':pass', $pass);
    $login->execute();

    $row = $login->fetch(PDO::FETCH_ASSOC);
    if($login->rowCount()) {
        $username = $row ['username'];
        $password = $row ['password'];
        $level = $row ['level'];
        
        if($level == '0'){

            session_start();
            $_SESSION['user'] = strtoupper($user);
            header('Location: school/englishportal.php');

            exit();
        }
        
        else if ($level == '1'){
            session_start();
            $_SESSION['user'] = $user;
            header('Location: admin/englishportal.php');
        }
    }
    else {
       echo "<script>alert('Username and password does not match.');
        window.location = 'index.php';
        </script>";
    }
}
    
?>