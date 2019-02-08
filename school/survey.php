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
        header('Location: ../index.html?status=error');
        exit();
    } 
    
include "../database.php"; 
include "sidebar.php";
include "footer.php";
include "scriptlink.php";
include "../survey/calculate.php";
?>
	<head>
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
		        <center>
			        <h2>HIP</h2>
			        <br>
		        </center>
		        <br>
		        <center>
		        	<div id="selected">
		        		<ul>
						  	<button type="button" class="btn btn-outline-info" id="choice1">Guideline</button>
						  	<button type="button" class="btn btn-outline-info" id="choice2">Result</button>
						  	<a href="percentage.php"><button type="button" class="btn btn-outline-info">Calculate</button></a>
						  	<a href="respondent.php"><button type="button" class="btn btn-outline-info">Respondent</button></a>
						</ul>

		        		
			        	
			        	
		        	</div>
		        </center>

		        <div id="choice">
		        	
		        </div>
			</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script type="text/javascript" src="sbutton.js"></script>
		<script type="text/javascript">
			$('button').on('click', function(){
		    $('button').removeClass('selected');
		    $(this).addClass('selected');
});
		</script>
	</body>
</html>