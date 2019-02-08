<!DOCTYPE html>
<!-- ====================================
Web Name: English Language PPDK
Author: Nadia Adibah bt Rajab
====================================== -->
<html>
<?php
session_start();
    $user = $_SESSION['user'];
    if(!$_SESSION['user']){
        session_destroy();
        header('Location: ../index.php?status=error');
        exit();
    } 
    
include "../database.php"; 
include "sidebar.php";
include "footer.php";
include "scriptlink.php";
include "../survey/calculate.php";

@$year = $_GET['tahun'];
@$term = $_GET['term'];
if($term == 1){
		 	$ops = '<=';
		 }
		 else {
		 	$ops = '>';
		 }
?>

<head>
	<title>Respondent</title>
</head>
<body>
	<!--================ content =========================-->
	<div class="main">
		<div class="container-fluid">
			<br>
		    <center>
				<h2>RESPONDENT</h2>
				<br>
			</center>
			<form method="get">
				<div class="form-row">
                    <div class="form-group col-md-1">
                        <label>Year</label>
                    </div>
                    <div class="form-group col-md-3">
                        <select name="tahun" class="form-control" onchange="this.form.submit()">
	                        <option value="">-- choose year--</option>
	                        <?php
	                            for ($y = 2018; $y <= date(Y); $y++) {
	                            echo '<option value="'.$y.'" '.($y == $year?'selected':'').'>'.$y.'</option>';
	                        } ?>
                    	</select>
                    </div>
                    <div class="form-group col-md-1">
                        <label>Term</label>
                    </div>
                    <div class="form-group col-md-3">
                        <select name="term" class="form-control" onchange="this.form.submit()">
	                        <option value="">-- choose term--</option>
	                        <option value="1" <?php echo ($term==1?'selected':'')?>>TERM 1</option>
	                        <option value="2" <?php echo ($term==2?'selected':'')?>>TERM 2</option>
                    	</select>
                    </div>
                </div>
            </form>
            <br><br>
			<!--====================== content ==========================-->

			<?php 
				$sql = $conn->prepare("SELECT * FROM percent WHERE sid = ? AND year = ? AND term = ?");
				$sql->execute([$user, $year, $term]);
				$row2 = $sql->fetch();

				$ahead = $row2['ahead'];
				$aparent = $row2['aparent'];
				$ateacher = percent($row2['ateacher']);
				$astudent = percent($row2['astudent']);
			?>
			<table class="table table-bordered">
				<thead class="thead-dark" align="center">
					<tr>
						<th rowspan="2">Year</th>
						<th colspan="4">Target</th>
						<th colspan="4">Exact</th>
					</tr>
					<tr>
						<th>School Head</th>
						<th>Teacher</th>
						<th>Student</th>
						<th>Parent and Community</th>
						<th>School Head</th>
						<th>Teacher</th>
						<th>Student</th>
						<th>Parent and Community</th>
					</tr>
				</thead>

				<tbody>
					<tr>
						<td><?= $year ?></td>
						<td><?= $ahead ?></td>
						<td><?= $ateacher ?></td>
						<td><?= $astudent ?></td>
						<td><?= $aparent ?></td>
						
						<?php 
							$sql = $conn->prepare("SELECT count(sid) as head FROM shead WHERE sid =? AND month(date) $ops 5 AND year(date) = ?");
							$sql->execute([$user, $year]);
							$row = $sql->fetch();
					 	?>
						<td><?= $row['head'] ?></td>
						
						<?php 
							$sql = $conn->prepare("SELECT count(sid) as teacher FROM steacher WHERE sid =? AND month(date) $ops 5 AND year(date) = ?");
							$sql->execute([$user, $year]);
							$row = $sql->fetch();
					 	?>
						<td><?= $row['teacher'] ?></td>

						<?php 
							$sql = $conn->prepare("SELECT count(sid) as stu FROM sstudent WHERE sid =? AND month(date) $ops 5 AND year(date) = ?");
							$sql->execute([$user, $year]);
							$row = $sql->fetch();
						?>
						<td><?= $row['stu'] ?></td>

						<?php 
							$sql = $conn->prepare("SELECT count(sid) as parent FROM sparent WHERE sid =? AND month(date) $ops 5 AND year(date) = ?");
							$sql->execute([$user, $year]);
							$row = $sql->fetch();
						?>
						<td><?= $row['parent'] ?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>