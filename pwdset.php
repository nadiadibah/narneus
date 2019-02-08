<!DOCTYPE html>
<!-- ====================================
Web Name: English Language PPDK
Author: Nadia Adibah bt Rajab
====================================== -->
<html>
<head>
        <?php
        include "database.php";

        if (isset($_POST['reset'])){
                $sid = $_POST['sid'];
                $new = md5($_POST['newpwd']);

                $sql = $conn->prepare("UPDATE users SET password =? WHERE username =?");
                $sql->execute([$new, $sid]);

                $success = "you have succesfully changed the password.";
                echo "<script>alert('.$success.')</script>";
                header("Location:index.html");
        }
        ?>
	<title>Password Reset</title>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <style type="text/css">
        	h3{
                        margin: 50px;
        	}
                h2{
                        color:#fff;
                        font-size: 40px;
                }

                .header{
                background-color:powderblue;
                height: 50px;
                }
                .form-control{
                        width:50%;
                
            }
        </style>
</head>
<body>
        <div class="header">
            <h2 class="text-center">English Language PPD Kluang</h2>
        </div>
        <div class="container">
                <h3><b>Reset your account password</b></h3>
                <form method="post">
                        <p>Enter your school code:</p>
                        <input type="text" name="sid" class="form-control" required="required" />
                        <br>
                        <p>Enter your new password:</p>
                        <input type="text" name="newpwd" class="form-control" required="required" />
                        <br>
                        <button type="submit" name="reset" class="btn btn-info" value="reset">SUBMIT</button>

                </form>
        </div>
        

</body>
</html>