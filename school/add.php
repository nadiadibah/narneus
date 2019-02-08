<!DOCTYPE html>
<!-- ====================================
Web Name: English Language PPDK
Author: Nadia Adibah bt Rajab
====================================== -->
<html>
<head>
</head>
 
<body>
<?php
session_start();
    $user = $_SESSION['user'];
    if(!$_SESSION['user']){
        session_destroy();
        header('Location: ../index.php?status=error');
        exit();
    }
include("../database.php");
 
if(isset($_POST['submit'])) {    
    $name = $_POST['name'];
    $ic = $_POST['ic'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $poscode = $_POST['poscode'];
    $option = $_POST['option'];
    $muet = $_POST['muet'];
    $cpt = $_POST['cpt'];
    if ($cpt == "No") {
         $cptb = "-";
    }
    else {
        $cptb = $_POST['cptb'];
    }

    $elt = $_POST['elt'];
    if ($elt == "No") {
         $yelt = "-";
    }
    else {
        $yelt = $_POST['yelt'];
    }
    
    $marker = $_POST['marker'];
    $position = $_POST['position'];
    $yot = $_POST['yot'];
    $exp = $_POST['exp'];
    $sid = $_POST['sid'];

        //insert data to database
        $sql = ("INSERT INTO teacher (name, ic, phone, email, address, city, state, poscode, option, muet, cpt, cptb, elt, yelt, marker, position, exp, sid) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $stmt = $conn->prepare($sql);

        $stmt->execute([$name, $ic, $phone, $email, $address, $city, $state, $poscode, $option, $muet, $cpt, $cptb, 
            $elt, $yelt, $marker, $position, $exp, $sid]);

        foreach ($yot as $select){
            
            $sql2 = ("INSERT INTO yot(standard,temail)VALUES(:select, :email)");
            $stmt2 = $conn->prepare($sql2);
            $stmt2->bindParam(':select', $select);
            $stmt2->bindParam(':email', $email);
            $stmt2->execute();
        }

        echo "<script>alert('Registration is successful.');
        window.location = 'englishportal.php?status=added';
        </script>";
   }     

?>
</body>
</html>