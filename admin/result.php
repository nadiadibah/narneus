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
				<h2>RESULT</h2>
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
            <!--====================== content ==========================-->
			<table class="table table-bordered">
				<thead class="thead-dark" align="center">
					<tr>
						<th rowspan="2">No.</th>
						<th rowspan="2">School Name</th>
						<th colspan="4">Mean Score</th>
						<th rowspan="2">Total Score</th>
						<th rowspan="2">Level of Immersiveness</th>
					</tr>
					<tr>
						<th>School Head</th>
						<th>Parents and Community</th>
						<th>Teachers</th>
						<th>Students</th>
					</tr>
				</thead>
				
				<?php
					
					$count = 1;
		        	$sql = $conn->query("SELECT * FROM emis WHERE JENIS $lol 200 ORDER BY NAMASEKOLAH ASC"); 
		        
		        	while ($row = $sql->fetch()){
			        	$shead = kira($row['KODSEKOLAH'], 'shead', $term, $year);
			        	$sparent = kira($row['KODSEKOLAH'], 'sparent', $term, $year);
			        	$steacher = kira($row['KODSEKOLAH'], 'steacher', $term, $year);
			        	$sstudent = kira($row['KODSEKOLAH'], 'sstudent', $term, $year);
			        	$score = $shead+$sparent+$steacher+$sstudent;
        		?>

        		<tbody>
        			<tr>
        				<td><?= $count ?></td>
						<td><?= $row['NAMASEKOLAH'] ?></td>
						<td class="center"><?= $shead ?></td>
						<td class="center"><?= $sparent ?></td>
						<td class="center"><?= $steacher ?></td>
						<td class="center"><?= $sstudent ?></td>
						<td class="center"><?= $score ?></td>
						<td class="center"><?= level($score)?></td>
					</tr>
        		</tbody>
				<?php $count++; } ?>
			</table>

			<center>
	            <form method="post" action="excel.php">
	              	<input type="hidden" name="year" value="<?= $year ?>">
	              	<input type="hidden" name="term" value="<?= $term ?>">
	              	<input type="hidden" name="level" value="<?= $level ?>">
	                <button class="btn btn-success" name="export">Export to Excel</button>
	            </form>
        	</center>
		</div>
	</div>
</body>
</html>

