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
        header('Location: ../index.html?status=error');
        exit();
    } 

include "../database.php";
include "sidebar.php";
include "scriptlink.php";
include "footer.php";

if (isset ($_POST['KP'])){
    $sql = $conn->prepare("UPDATE teacher SET panitia = 'KP' WHERE tid = ?");
    $sql->execute([$_POST['KP']]);
}
?>

<head>
    <!--========================= styling =================================-->
        <style>
        
        td, th {
            text-align: center;
        }
        
        .form-control {
            width:auto;
        }
        </style>
        <title>English Portal</title>
</head>
<body>
        <!--========================= content ============================-->
        <div class="main">
            <div class="container-fluid">
                <br>
                <center><h2>LIST OF TEACHER</h2></center>
                <br>
                <!--======================== Date =========================-->
                <p id="demo" align="center" style="font-style: italic; font-family:monospace; font-weight: bolder;"></p>
                <script>
                    var d = new Date();
                    document.getElementById("demo").innerHTML = d.toDateString();
                </script>
                <br>

                <!--======================== Table start ==================================-->
                    <table align="center" class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>IC Number</th>
                                <th>Phone Number</th>
                                <th>Email</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>

                        <?php
                            $count=1;
                            $sql = $conn->prepare("SELECT * FROM teacher WHERE sid = :user");
                            $sql->bindParam(':user',$user); 
                            $sql->execute();
                            while ($row = $sql->fetch()) { 
                        ?>
                            
                        <tbody>
                            <tr>
                                <td><?= $count ?></td>
                                <td><?= $row["name"] ?></td>
                                <td><?= $row["ic"] ?></td>
                                <td><?= $row["phone"] ?></td>
                                <td><?= $row["email"] ?></td>
                                <td><a href="edit.php?id=<?= $row['tid'] ?>" class="fa fa-edit"></a></td>
                                <td><a onclick="return confirm('Are you sure you want to delete the data?')" href="delete.php?del=<?= $row['tid'] ?>" class="fa fa-trash"></a></td>
                            </tr>
                        </tbody>
                        
                        <?php $count++; } ?>
                    </table>
                <br><br>
            </div>
        </div>
</body>
</html>