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

$sid = $_GET['id'];
$sql3 = $conn->prepare("SELECT NAMASEKOLAH FROM emis WHERE KODSEKOLAH = ?");
$sql3->execute([$sid]);
$row3 = $sql3->fetch();
?>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>English Portal</title>
	</head>
	<body>
		<!--======================= content ============================-->
        <div class="main">
            <div class="container-fluid">
                <br>
                <center>
                    <h2>LIST OF TEACHER</h2>
                    <h3><?= $row3['NAMASEKOLAH'] ?></h3>
                </center>
                <br>
                <table id="teacherlist" class="display">
                    <thead align="center">
                        <tr>
                            <th>Name</th>
                            <th>IC Number</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Position</th>
                            <th>Option</th>
                            <th>CPT</th>
                            <th>CPT Band</th>
                            <th>MUET</th>
                            <th>ELT</th>
                            <th>ELT (Year)</th>
                            <th>Marker</th>
                            <th>Experience</th>
                            <th>Class</th>
                        </tr>
                    </thead>
                    <tbody> 

                        <?php
                            $count=0;
                            $sql = $conn->prepare("SELECT * FROM teacher WHERE sid = :sid");
                            $sql->bindParam(':sid',$sid); 
                            $sql->execute();
                            while ($row = $sql->fetch()) { 
                        ?>

                        <tr>
                            <td><?= $row["name"] ?></td>
                            <td><?= $row["ic"] ?></td>
                            <td><?= $row["phone"] ?></td>
                            <td><?= $row["email"] ?></td>
                            <td><?= $row["address"] ?></td>
                            <td><?= $row["position"] ?></td>
                            <td><?= $row["option"] ?></td>
                            <td><?= $row["cptb"] ?></td>
                            <td><?= $row["muet"] ?></td>
                            <td><?= $row["muet"] ?></td>
                            <td><?= $row["elt"] ?></td>
                            <td><?= $row["yelt"] ?></td>
                            <td><?= $row["marker"] ?></td>
                            <td><?= $row["exp"] ?></td>
                            <td>

                            <?php 
                                $sql2 = $conn->prepare("SELECT yot.standard FROM yot INNER JOIN teacher ON yot.temail = teacher.email WHERE yot.temail = ?");
                                    $sql2->execute([$row["email"]]);
                                    $array = array();
                                    while($row2 = $sql2->fetch()){
                                        $array[] = $row2['standard'];
                                 } echo implode(',',$array); ?></td>
                            <?php $count++; } ?>
                        </tr>
                    </tbody>
                </table>
               <b><?php echo 'TOTAL: '.$count. ''; ?></b>
            </div>
		</div>

		<script type="text/javascript">
        	$(document).ready( function () {
			    $('#teacherlist').DataTable( { responsive: true });
			} );
        </script>
	</body>
</html>