<!DOCTYPE html>
<!-- ====================================
Web Name: English Language PPDK
Author: Nadia Adibah bt Rajab
====================================== -->
<?php

if(isset($_POST['check'])){

	include '../database.php';
	$sid = $_POST['sid'];
	$year = $_POST['year'];
	$teacher = $_POST['teacher'];
	$stu = $_POST['stu'];
	$head = $_POST['head'];
	$parent = $_POST['parent'];
    $term = $_POST['term'];

	$sql = $conn->prepare("INSERT INTO percent (sid, year, term, ahead, aparent, ateacher, astudent) VALUES (?,?,?,?,?,?,?)");
	$sql->execute([$sid, $year, $term, $head, $parent, $teacher, $stu]);

    echo "<script>alert('Data is successfully calculated.');
        window.location = 'percentage.php?status=added';
        </script>";
}

elseif (isset($_POST['edit'])){
		include '../database.php';
		$edit=$conn->prepare("UPDATE percent SET year=?,term=?, ahead=?, aparent=?, ateacher=?, astudent=?
		 WHERE id=?");
		$edit->execute([
		$_POST['year'], $_POST['term'], $_POST['head'], $_POST['parent'], $_POST['teacher'], $_POST['stu'],
		 $_POST['id']]);
		header('Location: percentage.php?status=updated');
		exit();
}

elseif (isset($_GET['del'])){
        include '../database.php';
        $del=$conn->prepare("DELETE FROM percent WHERE id=?");
        $del->execute([$_GET['del']]);
        header('Location: percentage.php?status=deleted');
        exit();
}
	
else{
	session_start();
	session_destroy();
	header('Location: ../index.php?status=error');
	exit();
}


?>