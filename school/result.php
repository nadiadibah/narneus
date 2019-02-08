<!DOCTYPE html>
<!-- ====================================
Web Name: English Language PPDK
Author: Nadia Adibah bt Rajab
====================================== -->
<html>
<?php
session_start();
    $user = $_SESSION['user'];
    
include "../database.php"; 
include "../survey/calculate.php";
?>
<head>
	<title>Result</title>
</head>
<body>
	<!--================ content =========================-->
	<br>
	<h5>TERM 1</h5>
	<table class="table table-bordered">
		<thead class="thead-dark" align="center">
			<tr>
				<th rowspan="3">Year</th>
				<th colspan="6">Term 1</th>
			</tr>
			<tr>
				<th colspan="4">Mean Score</th>
				<th rowspan="2">Total Score</th>
				<th rowspan="2">Level of Immersiveness</th>
			</tr>
			<tr>
				<th>School Head</th>
				<th>Teacher</th>
				<th>Student</th>
				<th>Parent and community</th>
			</tr>
		</thead>

		<?php
			$sql = $conn->query("SELECT distinct (year(date)) as tahun FROM shead ORDER BY date ASC");
			$row = $sql->fetchAll();
        ?>
		<tbody>
			<?php foreach ($row as $r) {
				$shead = kira($user, 'shead', 1, $r['tahun'] );
				$sparent = kira($user, 'sparent', 1, $r['tahun']);
				$steacher = kira($user, 'steacher', 1, $r['tahun']);
				$sstudent = kira($user, 'sstudent', 1, $r['tahun']);
			?>
			<tr>
				<td><?= $r['tahun'] ?></td>
				<td class="center"><?= $shead ?></td>
				<td class="center"><?= $steacher ?></td>
				<td class="center"><?= $sstudent ?></td>
				<td class="center"><?= $sparent ?></td>
				<td class="center"><?= $score = $shead+$sparent+$steacher+$sstudent ?></td>
				<td class="center"><?= level($score)?></td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
	<br>
	<h5>TERM 2</h5>
	<table class="table table-bordered">
		<thead class="thead-dark" align="center">
			<tr>
				<th rowspan="3">Year</th>
				<th colspan="6">Term 2</th>
			</tr>
			<tr>
				<th colspan="4">Mean Score</th>
				<th rowspan="2">Total Score</th>
				<th rowspan="2">Level of Immersiveness</th>
			</tr>
			<tr>
				<th>School Head</th>
				<th>Teacher</th>
				<th>Student</th>
				<th>Parent and community</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach ($row as $r) {
				$shead = kira($user, 'shead',2, $r['tahun']);
				$sparent = kira($user, 'sparent',2, $r['tahun']);
				$steacher = kira($user, 'steacher',2, $r['tahun']);
				$sstudent = kira($user, 'sstudent',2, $r['tahun']);
			?>
			<tr>
				<td><?= $r['tahun'] ?></td>
				<td class="center"><?= $shead ?></td>
				<td class="center"><?= $steacher ?></td>
				<td class="center"><?= $sstudent ?></td>
				<td class="center"><?= $sparent ?></td>
				<td class="center"><?= $score = $shead+$sparent+$steacher+$sstudent ?></td>
				<td class="center"><?= level($score)?></td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
</body>
</html>