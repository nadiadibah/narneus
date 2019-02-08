<!DOCTYPE html>
<!-- ====================================
Web Name: English Language PPDK
Author: Nadia Adibah bt Rajab
====================================== -->
<html>
<head>
    <?php 
        include "../database.php";
    ?>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="../css/admin.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <link rel="icon" href="../image/favicon.ico" type="image/x-icon">

</head>
<body>
    
    <div class="container" style="padding-top:50px;">
        <form name="myForm" action="submit.php" method="POST">
            <table class="table table-bordered">
                <tr>
                    <td><label>Full Name</label></td>
                    <td><input type="text" class="form-control" name="name" placeholder="Full Name" required="required" /></td>
                </tr>
                <tr>
                    <td><label>IC Number</label></td>
                    <td><input type="number" class="form-control" name="ic" placeholder="Identity Card" required="required"/></td>
                </tr>
                <tr>
                    <td><label>Domain</label></td>
                    <td><select required="required" id="domain" name="domain"  class="form-control"> 
                            <option value="" disabled selected>-- choose domain --</option>
                            <option value="schoolhead">School Head</option>
                            <option value="teacher">Teacher</option>
                            <option value="parentandcom">Parent</option>
                            <option value="student">Student</option>
                        </select>
                    </td>
                </tr>

                    <?php 
                        $sql = $conn->query("SELECT * FROM emis");
                    ?>

                <tr>
                    <td><label>School</label></td>
                    <td>
                        <select required name="sid" class="form-control" > 
                            <option value="" disabled selected>-- choose school --</option>
                            <?php while ($row = $sql->fetch()){ 
                            echo "<option value=".$row['KODSEKOLAH'].">".$row['KODSEKOLAH']."   -   ".$row['NAMASEKOLAH']."</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label>Date</label></td>
                    <td><input type="date" name="date" class="form-control"  required="required"></td>
                </tr>
            </table>
            <!--============ Display survey form ==========-->
            <div id="surveyform">
            
            </div>

            <center>
                    <button type="submit" name="submit" class="btn btn-info" value="submit">SUBMIT</button>
            </center>
        </form>
        <br>
        <div>
            <p class="text-center text-muted small">&COPY; 2018-<?php echo date("Y"); ?> Pejabat Pendidikan Daerah Kluang. All rights reserved.</p>
            </div>
    </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="survey.js"></script>
</body>
</html>