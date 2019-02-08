<!DOCTYPE html>
<!-- ====================================
Web Name: English Language PPDK
Author: Nadia Adibah bt Rajab
====================================== -->
<html>
<?php 
session_start();
    $admin = $_SESSION['user'];
    if(!$_SESSION['user']){
        session_destroy();
        header('Location: ../index.php?status=error');
        exit();
   }

include "../database.php"; 
include "sidebar.php";
include "footer.php";
include "scriptlink.php";
?>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>English Portal</title>
    </head>
    <body>
        <!--================================= content ======================================-->
        <div class="main">
            <div class="container-fluid">
                <br>
                    <h2>LIST OF SCHOOL</h2>
                <br>
                
                <?php
                    $sql = $conn->prepare("SELECT * FROM emis");
                    $sql->execute();
                ?>

                <table id="adminview" class="display">
                    <thead>
                        <tr>
                            <th>SCHOOL NAME</th>
                        </tr>
                    </thead>
                    <tbody> 
                        <?php while($row = $sql->fetch()) { ?>
                        <tr>
                            <td><a href="view.php?id=<?= $row['KODSEKOLAH'] ?>"><?= $row['NAMASEKOLAH'] ?></a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>