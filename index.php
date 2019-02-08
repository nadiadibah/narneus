<!DOCTYPE html>
<!-- ====================================
Web Name: English Language PPDK
Author: Nadia Adibah bt Rajab
====================================== -->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="icon" href="image/favicon.ico" type="image/x-icon">
        
        <!--============= styling ================-->
        <style>
            body {
                background:url(image/bg.jpg);
            }
            h2{
                color:#fff;
                font-size: 40px;
                padding: 10px;
            }
            .header{
                background-color:powderblue;
                height: 70px;
            }
            .login-form {
		      width: 50%;
		      margin: 30px auto;
              padding-top: 30px;
            }
            form {        
            margin-bottom: 15px;
            background: #fff;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-radius: 12px;
            padding: 30px;
            }
            
            .login-btn {
            font-size: 15px;
            
            }
        </style>

        <title>Login Page</title>
    </head>
    <body>
        <!--================= header =====================-->
        <div class="header">
            <h2 class="text-center">English Language PPD Kluang</h2>
        </div>

        <!--=================== container start ======================-->
        <div class="container">
            <div class="login-form">
                <form action="verify.php" method="post">
                    <center>
                        <img id="img1" src="image/ppd.logo.kpm.png" height="80" width="50%" >
                    </center>
                    <br>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" class="form-control" name="username" placeholder="Username" required="required">				
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input type="password" class="form-control" name="password" placeholder="Password" required="required">				
                        </div>
                    </div>        
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-info login-btn btn-block">Log In</button>
                    </div>
                    <div class="form-group">
                        <a href="survey/survey.php"><b>HIP SURVEY</b></a>
                        <a style="float:right;" href="pwdset.php">Forgot password?</a>
                    </div>
                </form>
            </div>

            <!--=========================== footer ==========================-->
            <div>
                <p class="text-center text-muted small">&COPY; 2018-<?php echo date("Y"); ?> Pejabat Pendidikan Daerah Kluang. All rights reserved.</p>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>
