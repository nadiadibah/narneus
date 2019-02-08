<!DOCTYPE html>
<!-- ====================================
Web Name: English Language PPDK
Author: Nadia Adibah bt Rajab
====================================== -->
<html>
<head>
	<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Survey</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
</head>

<body>
    <?php
        include "../database.php";

        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $domain = $_POST['domain'];
            $date = $_POST['date'];
            $year = date('Y');
            $ic = $_POST['ic'];

            $test = ['shead', 'sparent', 'steacher', 'sstudent'];

            foreach($test as $total){
                if($total != $domain ){
                    $query = $conn->prepare("SELECT ic as ic FROM $total WHERE ic = ? AND year(date) = ? LIMIT 1");
                    $query->execute([$ic, $year]);
                    $ic = $query->fetchAll();

                    if($ic){
                        echo "<script>alert('Your IC Number already exist.');
                                window.location = 'survey.php';
                                </script>";
                        exit();
                    }
                }
            }
            $query = $conn->prepare("SELECT count(ic) as ic FROM $total WHERE ic = ? AND year(date) = ?");
            $query->execute([$ic, $year]);
            $ic = $query->fetch();

            if($ic['ic'] > 2){
                echo "<script>alert('Your IC Number already exist.');
                                window.location = 'survey.php';
                                </script>";
            }

            $sid = $_POST['sid'];
           
            if($domain == "schoolhead"){
                
                $hc1q1 = $_POST['hc1q1'];
                $hc1q2 = $_POST['hc1q2'];
                $hc1q3 = $_POST['hc1q3'];
                $hc1q4 = $_POST['hc1q4'];
                $hc1q5 = $_POST['hc1q5'];
                $hc1q6 = $_POST['hc1q6'];
                $hc2q1 = $_POST['hc2q1'];
                $hc2q2 = $_POST['hc2q2'];
                $hc2q3 = $_POST['hc2q3'];
                $hc2q4 = $_POST['hc2q4'];
                $hc2q5 = $_POST['hc2q5'];
                $hc2q6 = $_POST['hc2q6'];
                $hc3q1 = $_POST['hc3q1'];
                $hc3q2 = $_POST['hc3q2'];
                $hc3q3 = $_POST['hc3q3'];
                $hc3q4 = $_POST['hc3q4'];
                $hc4q1 = $_POST['hc4q1'];
                $hc4q2 = $_POST['hc4q2'];
                $hc4q3 = $_POST['hc4q3'];
                $hc4q4 = $_POST['hc4q4'];

                $sql = "INSERT INTO shead (fullname, ic, sid, date, hc1q1, hc1q2, hc1q3, hc1q4, hc1q5, hc1q6, hc2q1, hc2q2, hc2q3,
                hc2q4, hc2q5, hc2q6, hc3q1, hc3q2, hc3q3, hc3q4, hc4q1, hc4q2, hc4q3, hc4q4) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $stmt = $conn->prepare($sql);

                $stmt->execute([$name, $ic, $sid, $date, $hc1q1, $hc1q2, $hc1q3, $hc1q4, $hc1q5, $hc1q6, $hc2q1, $hc2q2, $hc2q3, $hc2q4, $hc2q5, $hc2q6,
                $hc3q1, $hc3q2, $hc3q3, $hc3q4, $hc4q1, $hc4q2, $hc4q3, $hc4q4]);
            }

            if($domain == "student") {

                $sc1q1 = $_POST['sc1q1'];
                $sc1q2 = $_POST['sc1q2'];
                $sc1q3 = $_POST['sc1q3'];
                $sc1q4 = $_POST['sc1q4'];
                $sc1q5 = $_POST['sc1q5'];
                $sc1q6 = $_POST['sc1q6'];
                $sc1q7 = $_POST['sc1q7'];
                $sc1q8 = $_POST['sc1q8'];
                $sc1q9 = $_POST['sc1q9'];
                $sc1q10 = $_POST['sc1q10'];
                $sc1q11 = $_POST['sc1q11'];
                $sc2q1 = $_POST['sc2q1'];
                $sc2q2 = $_POST['sc2q2'];
                $sc2q3 = $_POST['sc2q3'];
                $sc2q4 = $_POST['sc2q4'];
                $sc3q1 = $_POST['sc3q1'];
                $sc3q2 = $_POST['sc3q2'];
                $sc3q3 = $_POST['sc3q3'];
                $sc3q4 = $_POST['sc3q4'];
                $sc3q5 = $_POST['sc3q5'];

                $sql = "INSERT INTO sstudent (fullname, ic, sid, date, sc1q1, sc1q2, sc1q3, sc1q4, sc1q5, sc1q6, sc1q7, sc1q8, sc1q9, sc1q10, sc1q11,
                sc2q1, sc2q2, sc2q3, sc2q4, sc3q1, sc3q2, sc3q3, sc3q4, sc3q5) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $stmt = $conn->prepare($sql);

                $stmt->execute([$name, $ic, $sid, $date, $sc1q1, $sc1q2, $sc1q3, $sc1q4, $sc1q5, $sc1q6, $sc1q7, $sc1q8, $sc1q9, $sc1q10, $sc1q11,
                $sc2q1, $sc2q2, $sc2q3, $sc2q4, $sc3q1, $sc3q2, $sc3q3, $sc3q4, $sc3q5]);

            }

            if($domain == "teacher") {

                $tc1q1 = $_POST['tc1q1'];
                $tc1q2 = $_POST['tc1q2'];
                $tc1q3 = $_POST['tc1q3'];
                $tc1q4 = $_POST['tc1q4'];
                $tc1q5 = $_POST['tc1q5'];
                $tc1q6 = $_POST['tc1q6'];
                $tc1q7 = $_POST['tc1q7'];
                $tc2q1 = $_POST['tc2q1'];
                $tc2q2 = $_POST['tc2q2'];
                $tc2q3 = $_POST['tc2q3'];
                $tc2q4 = $_POST['tc2q4'];
                $tc2q5 = $_POST['tc2q5'];
                $tc2q6 = $_POST['tc2q6'];
                $tc3q1 = $_POST['tc3q1'];
                $tc3q2 = $_POST['tc3q2'];
                $tc3q3 = $_POST['tc3q3'];
                $tc3q4 = $_POST['tc3q4'];
                $tc3q5 = $_POST['tc3q5'];
                $tc3q6 = $_POST['tc3q6'];
                $tc3q7 = $_POST['tc3q7'];

                $sql = "INSERT INTO steacher (fullname, ic, sid, date, tc1q1, tc1q2, tc1q3, tc1q4, tc1q5, tc1q6, tc1q7, tc2q1, tc2q2, tc2q3,
                tc2q4, tc2q5, tc2q6, tc3q1, tc3q2, tc3q3, tc3q4, tc3q5, tc3q6, tc3q7) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $stmt = $conn->prepare($sql);

                $stmt->execute([$name, $ic, $sid, $date, $tc1q1, $tc1q2, $tc1q3, $tc1q4, $tc1q5, $tc1q6, $tc1q7, $tc2q1, $tc2q2, $tc2q3,
                $tc2q4, $tc2q5, $tc2q6, $tc3q1, $tc3q2, $tc3q3, $tc3q4, $tc3q5, $tc3q6, $tc3q7]);

            }

            if($domain == "parentandcom") {

                $pc1q1 = $_POST['pc1q1'];
                $pc1q2 = $_POST['pc1q2'];
                $pc1q3 = $_POST['pc1q3'];
                $pc1q4 = $_POST['pc1q4'];
                $pc1q5 = $_POST['pc1q5'];
                $pc1q6 = $_POST['pc1q6'];
                $pc1q7 = $_POST['pc1q7'];
                $pc1q8 = $_POST['pc1q8'];
                $pc1q9 = $_POST['pc1q9'];
                $pc1q10 = $_POST['pc1q10'];
                $pc1q11 = $_POST['pc1q11'];
                $pc2q1 = $_POST['pc2q1'];
                $pc2q2 = $_POST['pc2q2'];
                $pc2q3 = $_POST['pc2q3'];
                $pc2q4 = $_POST['pc2q4'];
                $pc3q1 = $_POST['pc3q1'];
                $pc3q2 = $_POST['pc3q2'];
                $pc3q3 = $_POST['pc3q3'];
                $pc3q4 = $_POST['pc3q4'];
                $pc3q5 = $_POST['pc3q5'];

                $sql = "INSERT INTO sparent (fullname, ic, sid, date, pc1q1, pc1q2, pc1q3, pc1q4, pc1q5, pc1q6, pc1q7, pc1q8, pc1q9, pc1q10, pc1q11,
                pc2q1, pc2q2, pc2q3, pc2q4, pc3q1, pc3q2, pc3q3, pc3q4, pc3q5) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $stmt = $conn->prepare($sql);

                $stmt->execute([$name, $ic, $sid, $date, $pc1q1, $pc1q2, $pc1q3, $pc1q4, $pc1q5, $pc1q6, $pc1q7, $pc1q8, $pc1q9, $pc1q10, $pc1q11,
                $pc2q1, $pc2q2, $pc2q3, $pc2q4, $pc3q1, $pc3q2, $pc3q3, $pc3q4, $pc3q5]);

            }

            echo "<script>alert('Survey is successfully submitted. Thank you!');
        window.location = '../index.php';
        </script>";
        }
    ?>
	
</body>