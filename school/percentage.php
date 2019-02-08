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
include "../survey/calculate.php";
include "sidebar.php";
include "scriptlink.php";
include "footer.php";

if(isset($_GET['edit'])){
        $save=$conn->prepare("SELECT * FROM percent WHERE id=? LIMIT 1");
        $save->execute([$_GET['edit']]);
        $data=$save->fetch();
        
        $ahead=$data['ahead'];
        $aparent=$data['aparent'];
        $ateacher=$data['ateacher'];
        $astudent=$data['astudent'];
        $term=$data['term'];
        $year=$data['year'];
        $id=$data['id'];
    }
    else{
        $ahead="";
        $aparent="";
        $ateacher="";
        $astudent="";
        $term="";
        $year="";
        $id="";
    }

?>
<head>
	<!--================ styling =======================-->
        <style>
        
	        td{
	            padding:10px;
	        }
	        .a{
	            font-style: italic;
	            font-size: 12px;
	        }
	        form{
	            padding: 20px;
	        }
        </style>
	<title>Calculator</title>
</head>
<body>
    <div class="main">
        <div class="container-fluid">
            <h5 style="padding-top: 5%; text-decoration: underline;">ADD SCHOOL DATA</h5>
            
			<form method="post" action="check.php">
				<div class="form-row">
                    <div class="form-group col-md-2">
                        <label>Number of Head</label>
                        <p class="a">Jumlah Guru Besar/Pengetua</p>
                    </div>
                    <div class="form-group col-md-4">
                        <input type="number" class="form-control" name="head" value="1" readonly>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Number of Parent</label>
                        <p class="a">Jumlah Ibu Bapa</p>
                    </div>
                    <div class="form-group col-md-4">
                        <input type="number" class="form-control" name="parent" value="10" readonly>
                    </div>
                </div>
				<div class="form-row">
                    <div class="form-group col-md-2">
                        <label>Number of Teacher</label>
                        <p class="a">Jumlah Guru</p>
                    </div>
                    <div class="form-group col-md-4">
                        <input type="number" class="form-control" name="teacher" value="<?= $ateacher ?>" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Number of Student</label>
                        <p class="a">Jumlah Pelajar</p>
                    </div>
                    <div class="form-group col-md-4">
                        <input type="number" class="form-control" name="stu" value="<?= $astudent ?>" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label>Term</label>
                        <p class="a">Penggal</p>
                    </div>
                    <div class="form-group col-md-4">
                        <select required name="term" class="form-control">
                            <option value="">-- choose term --</option>
                        	<option value="1" <?php echo ($term==1?'selected':'')?>>Term 1 (January - May)</option>
                        	<option value="2" <?php echo ($term==2?'selected':'')?>>Term 2 (June - December)</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Year</label>
                        <p class="a">Tahun</p>
                    </div>
                    <div class="form-group col-md-4">
                        <select required name="year"  class="form-control"> 
                            <option value="">-- choose year --</option>
                            <?php for ($x = 2018; $x <= date("Y"); $x++) { ?>
                            <option value="<?= $x ?>" <?php if($year==$x) { echo "selected"; } ?>/><?= $x ?></option>
                            <?php  } ?>
                        </select>
                    </div>
                </div>
                
                <input type="hidden" name="sid" value="<?= $user ?>">
                <?php 
                if(isset($_GET['edit'])){
                    echo'<center>
                            <input type="hidden" name="id" value="'.$data['id'].'">
                            <button type="submit" name="edit" class="btn btn-info">UPDATE</button>
                        </center>';
                } 
                else {
                    echo'<center>
                            <div class="col-12 col-md-4">
                            <button type="submit" name="check" class="btn btn-info">CALCULATE</button>
                        </center>';
                            } ?>   
			</form>
		  
            <!--============================== check school data =================================-->
            <?php 
                @$year = $_GET['tahun'];

                $sql2 = $conn->prepare("SELECT * FROM percent WHERE year = ? AND sid = ?");
                $sql2->execute([$year, $user]);
            ?>
            <br>
            <h5 style="padding-top: 5%; text-decoration: underline;">CHECK SCHOOL DATA</h5>
            <form method="get">
                <center>
                    <select name="tahun" class="form-control" style="width: 30%;" onchange="this.form.submit()">
                        <option value="">-- choose year --</option>
                        <?php
                            for ($y = 2018; $y <= date(Y); $y++) {
                            echo '<option value="'.$y.'" '.($y == $year?'selected':'').'>'.$y.'</option>';
                        } ?>
                    </select>
                </center>
            </form>
            <br>
           
            <table class="table table-bordered">
                <thead class="thead-dark" align="center">
                    <tr>
                        <th rowspan="2">Term</th>
                        <th colspan="4">Target Respondent</th>
                        <th rowspan="2" colspan="2" width="5%">Action</th>
                    </tr>
                    <tr>
                        <th>School Head</th>
                        <th>Teacher</th>
                        <th>Student</th>
                        <th>Parent and Community</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        while ($row2 = $sql2->fetch()) {

                    ?>
                    <tr>
                        <td><?= $row2['term'] ?></td>
                        <td><?= $row2['ahead'] ?></td>
                        <td><?= percent($row2['ateacher']) ?></td>
                        <td><?= percent($row2['astudent']) ?></td>
                        <td><?= $row2['aparent'] ?></td>
                        <input type="hidden" name="id" value="<?= $row2['id'] ?>">

                        <td style="width:10%;"><a href="percentage.php?edit=<?= $row2['id'] ?>"><i class="fa fa-pencil"></i></a></td>         
                        <td style="width:10%;"><a onclick="return confirm('Are you sure you want to delete the data?')" href="check.php?del=<?= $row2['id'] ?>"><i class="fa fa-trash"></i></a></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
		</div>
    </div>
</body>
</html>