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
?>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<style type="text/css">
			button.selected{
  				color: #fff;
				background-color: #5bc0de;
				border-color: #46b8da;
			}
		</style>
		<title>Survey</title>
	</head>
	<body>
		<!--================ content =========================-->
		<div class="main">
			<div class="container-fluid">
		       	<br>
		        <center><h2>HIP</h2></center>
		        <br>
		        <center>
		        	<div id="selected">
		        		<button type="button" class="btn btn-outline-info" id="button1">Guideline</button>
			        	<a href="result.php"><button type="button" class="btn btn-outline-info">Result</button></a>
			        	<a href="respondent.php"><button type="button" class="btn btn-outline-info">Respondent</button></a>
		        	</div>
		        </center>

		        <div id="button">
		        	
		        </div>
			</div>
			
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script type="text/javascript" src="test.js"></script>
		<script type="text/javascript">
			$('button').on('click', function(){
		    $('button').removeClass('selected');
		    $(this).addClass('selected');
});
		</script>
	</body>
</html>