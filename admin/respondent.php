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
include "../survey/calculate.php";

@$year = $_GET['tahun'];
@$term = $_GET['term'];
if($term == 1){
	$ops = '<=';
}
else {
	$ops = '>';
}

@$level = $_GET['level'];
if($level == "SK"){
	$lol = '<';
}
else {
	$lol = '>=';
}
?>   

<body>
	<!--================================= content ======================================-->
	<div class="main">
		<div class="container-fluid">
			<br>
			<center>
				<h2>RESPONDENT</h2>
				<br>
			</center>
			<form method="get">
				<div class="form-row">
                    <div class="form-group mx-md-3">
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
                    <div class="form-group mx-md-3">
                        <label>Term</label>
                    </div>
                    <div class="form-group col-md-3">
                        <select name="term" class="form-control" onchange="this.form.submit()">
	                        <option value="">-- choose term--</option>
	                        <option value="1" <?php echo ($term==1?'selected':'')?>>TERM 1</option>
	                        <option value="2" <?php echo ($term==2?'selected':'')?>>TERM 2</option>
                    	</select>
                    </div>
                    <div class="form-group mx-md-3">
                        <label>Level</label>
                    </div>
                    <div class="form-group col-md-3">
                        <select name="level" class="form-control" onchange="this.form.submit()">
	                        <option value="">-- choose level--</option>
	                        <option value="SK" <?php echo ($level=="SK"?'selected':'')?>>PRIMARY SCHOOL</option>
	                        <option value="SM" <?php echo ($level=="SM"?'selected':'')?>>SECONDARY SCHOOL</option>
                    	</select>
                    </div>
                </div>
            </form>
            <br>

			<table class="table table-bordered">
				<thead class="thead-dark" align="center">
					<tr>
						<th rowspan="2">No.</th>
						<th rowspan="2">School Name</th>
						<th colspan="4">Target Respondent</th>
						<th colspan="4">Exact Respondent</th>
					</tr>
					<tr>
						<th>School Head</th>
						<th>Teacher</th>
						<th>Student</th>
						<th>Parent</th>
						<th>School Head</th>
						<th>Teacher</th>
						<th>Student</th>
						<th>Parent</th>
					</tr>
				</thead>
					
					

				<tbody>
					<?php 
						$count=1;
						$sql = $conn->query("SELECT * FROM emis WHERE JENIS $lol 200 ORDER BY NAMASEKOLAH ASC");
						while ($row = $sql->fetch ()){
						$sid = $row['KODSEKOLAH']; 
						$name = $row['NAMASEKOLAH'];

						$exact = $conn->prepare("SELECT * FROM percent WHERE sid = ? AND year = ? AND term = ?");
						$exact->execute([$sid, $year, $term]);
						$row2 = $exact->fetch();

						$ahead = $row2['ahead'];
						$aparent = $row2['aparent'];
						$ateacher = percent($row2['ateacher']);
						$astudent = percent($row2['astudent']);
					?>
					<tr>
						<td><?= $count ?></td>
						<td><?= $name ?></td>
						
						<td><?= $ahead ?></td>
						<td><?= $ateacher ?></td>
						<td><?= $astudent ?></td>
						<td><?= $aparent ?></td>
					<?php 
						$sql2 = $conn->prepare("SELECT count(sid) as sekolah FROM shead WHERE sid =? AND month(date) $ops 5 AND year(date) = ?");
						$sql2->execute([$sid, $year]);
						$row2 = $sql2->fetch();
					 ?>

						<td><?= $row2['sekolah'] ?></td>
					

					<?php 
						$sql2 = $conn->prepare("SELECT count(sid) as sekolah FROM steacher WHERE sid =? AND month(date) $ops 5 AND year(date) = ?");
						$sql2->execute([$sid, $year]);
						$row2 = $sql2->fetch();
					 ?>

						<td><?= $row2['sekolah'] ?></td>

					<?php 
						$sql2 = $conn->prepare("SELECT count(sid) as sekolah FROM sstudent WHERE sid =? AND month(date) $ops 5 AND year(date) = ?");
						$sql2->execute([$sid, $year]);
						$row2 = $sql2->fetch();
					 ?>

						<td><?= $row2['sekolah'] ?></td>

					<?php 
						$sql2 = $conn->prepare("SELECT count(sid) as sekolah FROM sparent WHERE sid =? AND month(date) $ops 5 AND year(date) = ?");
						$sql2->execute([$sid, $year]);
						$row2 = $sql2->fetch();
					 ?>

						<td><?= $row2['sekolah'] ?></td>

					<?php $count++; } ?>
					</tr>
				</tbody>
			</table>
			<center>
	            <form method="post" action="excel.php">
	              	<input type="hidden" name="year" value="<?= $year ?>">
	              	<input type="hidden" name="term" value="<?= $term ?>">
	              	<input type="hidden" name="level" value="<?= $level ?>">
	                <button class="btn btn-success" name="exportwo">Export to Excel</button>
	            </form>
        	</center>
		</div>
	</div>
</body> 
</html>