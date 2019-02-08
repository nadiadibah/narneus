
<!DOCTYPE html>
<!-- ====================================
Web Name: English Language PPDK
Author: Nadia Adibah bt Rajab
====================================== -->
<?php

session_start();
$user = $_SESSION['user'];
    if(!$_SESSION['user']){
        session_destroy();
        header('Location: ../index.php?status=error');
        exit();
    } 

include "../database.php";

$tid = $_GET['id'];
$sql = $conn->prepare ("SELECT * FROM teacher WHERE tid =:tid");
$sql->execute([':tid' => $tid]);
while ($row = $sql->fetch()) {

if(isset($_POST["update"])) {
    $name = $_POST['name'];
    $ic = $_POST['ic'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $poscode = $_POST['poscode'];
    $option = $_POST['option'];
    $muet = $_POST['muet'];
    $cpt = $_POST['cpt'];
    if ($cpt == "No") {
         $cptb = "-";
    }
    else {
        $cptb = $_POST['cptb'];
    }

    $elt = $_POST['elt'];
    if ($elt == "No") {
         $yelt = "-";
    }
    else {
        $yelt = $_POST['yelt'];
    }
    
    $marker = $_POST['marker'];
    $position = $_POST['position'];
    $exp = $_POST['exp'];
    $yot = $_POST['yot'];

        $sql = $conn->prepare("UPDATE teacher SET name = ?, ic = ?, phone = ?, email = ?, address = ?, city = ?, state = ?, poscode = ?, position = ?, option = ?, cpt = ?, cptb = ?,  muet = ?, elt = ?, yelt = ?, marker = ?,  exp = ? WHERE tid = ?");
                    
        $sql->execute([$name, $ic, $phone, $email, $address, $city, $state, $poscode, $position, $option, $cpt, 
            $cptb, $muet, $elt, $yelt, $marker, $exp, $tid]);

        //SQL Statement input yot
        $sql3 = $conn->prepare("DELETE FROM yot WHERE temail = ?");
        $sql3->execute([$email]);
        
        foreach ($yot as $select){
            
            $sql2 = ("INSERT INTO yot(standard,temail)VALUES(:select, :email)");
            $stmt2 = $conn->prepare($sql2);
            $stmt2->bindParam(':select', $select);
            $stmt2->bindParam(':email', $email);
            $stmt2->execute();
        }

        /*for($i=0; $i<6; $i++){
            $sql = $conn->prepare("INSERT INTO yot(standard, temail) VALUES(?,?)");
            $sql->execute(['$yot','$email']);
        }
        */
        echo "<script>alert('Data is successfully updated.');
        window.location = 'englishportal.php?status=updated';
        </script>";
}
    
?>

<html>
<?php 
    include "sidebar.php";
    include "scriptlink.php";
    include "footer.php";
?>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <!--======================== styling ==========================-->
        <style>
            td{
                padding:10px;
            }
            form{
                padding: 20px;
            }
            .red{
                color:red;
            }
            .a{
            font-style: italic;
            font-size: 12px;
        }
        </style>

        <title>Edit teacher profile</title>
    </head>
    
    <body>
       <!--========================== content ===============================-->
        <div class="main">
            <div class="container-fluid">
                <br>
                <center><h2>EDIT TEACHER PROFILE</h2></center>
                <br>
                <form class="card border-dark" method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Full Name</label>
                            <p class="a">Nama Penuh</p>
                            <input type="text" class="form-control red" name="name" value="<?= $row['name'] ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Identity Card Number</label>
                            <p class="a">Nombor Kad Pengenalan</p>
                            <input type="number" class="form-control red" name="ic" value="<?= $row['ic'] ?>">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Phone Number</label>
                            <p class="a">Nombor telefon</p>
                            <input type="number" class="form-control red" name="phone" value="<?= $row['phone'] ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Email</label>
                            <p class="a">Email</p>
                            <input type="email" class="form-control red" name="email" value="<?= $row['email'] ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Home Address</label>
                        <p class="a">Alamat Rumah</p>
                        <input type="text" class="form-control red" name="address" id="b" value="<?= $row['address'] ?>">
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>City</label>
                            <p class="a">Bandar/Daerah</p>
                            <input type="text" class="form-control red" name="city" value="<?= $row['city'] ?>">
                        </div>
                        <div class="form-group col-md-5">
                            <label>State</label>
                            <p class="a">Negeri</p>
                            <select name="state" class="form-control red">
                                <option value="" selected disabled>--State--</option>
                                <option value="Johor" 
                                <?php if($row['state']=="Johor") { echo "selected"; } ?>/>Johor</option>
                                <option value="Melaka" 
                                <?php if($row['state']=="Melaka") { echo "selected"; } ?>/>Melaka</option>
                                <option value="Negeri Sembilan"
                                <?php if($row['state']=="Negeri Sembilan") { echo "selected"; } ?>/>Negeri Sembilan</option>
                                <option value="Selangor"
                                <?php if($row['state']=="Selangor") { echo "selected"; } ?>/>Selangor</option>
                                <option value="Pahang" 
                                <?php if($row['state']=="Pahang") { echo "selected"; } ?>/>Pahang</option>
                                <option value="Perak" 
                                <?php if($row['state']=="Perak") { echo "selected"; } ?>/>Perak</option>
                                <option value="Pulau Pinang" 
                                <?php if($row['state']=="Pulau Pinang") { echo "selected"; } ?>/>Pulau Pinang</option>
                                <option value="Perlis" 
                                <?php if($row['state']=="Perlis") { echo "selected"; } ?>/>Perlis</option>
                                <option value="Kedah" 
                                <?php if($row['state']=="Kedah") { echo "selected"; } ?>/>Kedah</option>
                                <option value="Kelantan" 
                                <?php if($row['state']=="Kelantan") { echo "selected"; } ?>/>Kelantan</option>
                                <option value="Terengganu" 
                                <?php if($row['state']=="Terengganu") { echo "selected"; } ?>/>Terengganu</option>
                                <option value="Sabah" 
                                <?php if($row['state']=="Sabah") { echo "selected"; } ?>/>Sabah</option>
                                <option value="Sarawak" 
                                <?php if($row['state']=="Sarawak") { echo "selected"; } ?>/>Sarawak</option>
                                <option value="WPKL" 
                                <?php if($row['state']=="WPKL") { echo "selected"; } ?>/>Wilayah Persekutuan Kuala Lumpur</option>
                                <option value="WPP" 
                                <?php if($row['state']=="WPP") { echo "selected"; } ?>/>Wilayah Persekutuan Putrajaya</option>
                                <option value="WPL" 
                                <?php if($row['state']=="WPL") { echo "selected"; } ?>/>Wilayah Persekutuan Labuan</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Poscode</label>
                            <p class="a">Poskod</p>
                            <input type="number" class="form-control red" name="poscode" value="<?= $row['poscode'] ?>">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label>Option</label>
                            <p class="a">Guru Opsyen</p>
                        </div>
                        <div class="form-group col-md-3">
                            <div class="col-form-label">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="option1" name="option" class="custom-control-input" 
                                    value="Yes" <?php if ($row['option']=='Yes') { echo 'checked'; } ?> />
                                    <label class="custom-control-label" for="option1">Yes<p class="a">Ya</p></label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="option2" name="option" class="custom-control-input" 
                                    value="No" <?php if ($row["option"]=='No') { echo 'checked'; } ?> />
                                    <label class="custom-control-label" for="option2">No<p class="a">Bukan</p></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <label>Muet Band</label>
                            <p class="a">Band Muet</p>
                        </div>
                        <div class="form-group col-md-2">
                           <select name="muet" class="form-control red">
                                <option value="" selected disabled>--Band--</option>
                                <option value="1"<?php if($row['muet']=="1") { echo "selected"; } ?>/>Band 1</option>
                                <option value="2"<?php if($row['muet']=="2") { echo "selected"; } ?>/>Band 2</option>
                                <option value="3"<?php if($row['muet']=="3") { echo "selected"; } ?>/>Band 3</option>
                                <option value="4"<?php if($row['muet']=="4") { echo "selected"; } ?>/>Band 4</option>
                                <option value="5"<?php if($row['muet']=="5") { echo "selected"; } ?>/>Band 5</option>
                                <option value="6"<?php if($row['muet']=="6") { echo "selected"; } ?>/>Band 6</option>
                          </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label>CPT/APTIS</label>
                            <p class="a">CPT/APTIS</p>
                        </div>
                        <div class="form-group col-md-3">
                            <div class="col-form-label">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="cpt" name="cpt" class="custom-control-input" value="Yes" <?php if ($row['cpt']=='Yes') { echo 'checked'; } ?>>
                                    <label class="custom-control-label" for="cpt">Yes<p class="a">Ada</p></label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="cpt2" name="cpt" class="custom-control-input" value="No" <?php if ($row['cpt']=='No') { echo 'checked'; } ?>>
                                    <label class="custom-control-label" for="cpt2">No<p class="a">Tiada</p></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <label>CPT/APTIS Band</label>
                            <p class="a">Band CPT/APTIS</p>
                        </div>
                        <div class="form-group col-md-2">
                           <select name="cptb" class="form-control red">
                                <option selected disabled>--Band--</option>
                                <option value="A1"<?php if($row['cptb']=="A1") { echo "selected"; } ?>/>A1</option>
                                <option value="A2"<?php if($row['cptb']=="A2") { echo "selected"; } ?>/>A2</option>
                                <option value="B1"<?php if($row['cptb']=="B1") { echo "selected"; } ?>/>B1</option>
                                <option value="B2"<?php if($row['cptb']=="B2") { echo "selected"; } ?>/>B2</option>
                                <option value="C1"<?php if($row['cptb']=="C1") { echo "selected"; } ?>/>C1</option>
                                <option value="C2"<?php if($row['cptb']=="C2") { echo "selected"; } ?>/>C2</option>
                          </select>
                        </div> 
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label>Pro-ELT Course</label>
                            <p class="a">Kursus Pro-ELT</p>
                        </div>
                        <div class="form-group col-md-3">
                            <div class="col-form-label">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="elt" name="elt" class="custom-control-input" value="Yes" <?php if ($row['elt']=='Yes') { echo 'checked'; } ?>>
                                    <label class="custom-control-label" for="elt">Yes<p class="a">Ada</p></label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="elt2" name="elt" class="custom-control-input" value="No" <?php if ($row['elt']=='No') { echo 'checked'; } ?>>
                                    <label class="custom-control-label" for="elt2">No<p class="a">Tiada</p></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Pro-ELT Course (Year)</label>
                            <p class="a">Tahun Menghadiri Kursus Pro-ELT</p>
                        </div>
                        <div class="form-group col-md-2">
                           <select name="yelt" class="form-control red"> 
                                <option value="0"<?php if($row['yelt']=="0") { echo "selected"; } ?>/>None</option>
                                <?php for ($x = 2013; $x <= date("Y"); $x++) { ?>
                                <option value="<?= $x ?>" <?php if($row['yelt']==$x) { echo "selected"; } ?>/><?= $x ?></option>
                                <?php  } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label>UPSR/SPM Marker</label>
                            <p class="a">Penanda kertas UPSR/SPM</p>
                        </div>
                        <div class="form-group col-md-3">
                            <div class="col-form-label">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="marker" name="marker" class="custom-control-input" 
                                    value="Yes" <?php if ($row['marker']=='Yes') { echo 'checked'; } ?>>
                                    <label class="custom-control-label" for="marker">Yes<p class="a">Ya</p></label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="marker2" name="marker" class="custom-control-input" 
                                    value="No" <?php if ($row['marker']=='No') { echo 'checked'; } ?>>
                                    <label class="custom-control-label" for="marker2">No<p class="a">Bukan</p></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-1">
                            <label>Position</label>
                            <p class="a">Jawatan</p>
                        </div>
                        <div class="form-group col-md-3">
                           <select name="position" class="form-control red">
                                <option disabled selected>--Choose/Pilih--</option>
                                <option value="principal"
                                <?php if($row['position']=='principal') { echo "selected"; } ?>/>Principal/Pengetua</option>
                                <option value="GKMP"
                                <?php if($row['position']=='GKMP') { echo "selected"; } ?>>Senior Assistant/ GKMP</option>
                                <option value="hod"
                                <?php if($row['position']=='hod') { echo "selected"; } ?>>Head of Panel/Ketua Panitia</option>
                                <option value="PPMP"
                                <?php if($row['position']=='PPMP') { echo "selected"; } ?>>PPMP</option>
                                <option value="teacher" 
                                <?php if($row['position']=='teacher') { echo "selected"; } ?>>Teacher/Guru Biasa</option>
                          </select>
                        </div>
                    </div>

                    <?php 
                        $sql2 = $conn->prepare("SELECT yot.standard FROM yot INNER JOIN teacher on yot.temail = teacher.email WHERE yot.temail = ?");
                        $sql2->execute([$row["email"]]);
                        $array = array();
                        while($row2 = $sql2->fetch()){
                        $array[] = $row2['standard'];
                    } ?>

                    <div class="form-row form-group">
                        <div class="form-group col-md-2">
                            <label>Class</label>
                            <p class="a">Kelas Mengajar</p>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="yot" name="yot[]" value="1" <?php if (in_array("1",$array)) { echo 'checked'; } ?>/>
                                <label class="custom-control-label" for="yot">Year/Form 1<p class="a">Tahun/Tingkatan 1</p></label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="yot2" name="yot[]" value="2" <?php if (in_array("2",$array)) { echo 'checked'; } ?>/>
                                <label class="custom-control-label" for="yot2">Year/Form 2<p class="a">Tahun/Tingkatan 2</p></label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="yot3" name="yot[]" value="3" <?php if (in_array("3",$array)) { echo 'checked'; } ?>/>
                                <label class="custom-control-label" for="yot3">Year/Form 3<p class="a">Tahun/Tingkatan 3</p></label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="yot4" name="yot[]" value="4" <?php if (in_array("4",$array)) { echo 'checked'; } ?>/>
                                <label class="custom-control-label" for="yot4">Year/Form 4<p class="a">Tahun/Tingkatan 4</p></label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="yot5" name="yot[]" value="5" <?php if (in_array("5",$array)) { echo 'checked'; } ?>/>
                                <label class="custom-control-label" for="yot5">Year/Form 5<p class="a">Tahun/Tingkatan 5</p></label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="yot6" name="yot[]" value="6" <?php if (in_array("6",$array)) { echo 'checked'; } ?>/>
                                <label class="custom-control-label" for="yot6">Year/Form 6<p class="a">Tahun/Tingkatan 6</p></label>
                            </div>
                        </div>

                        <div class="form-group col-md-2">
                            <label>Teaching Experience</label>
                            <p class="a">Pengalaman Mengajar</p>
                        </div>
                        <div class="form-group col-md-3">
                            <input type="text" class="form-control red" name="exp" value="<?= $row['exp'] ?>">
                        </div>
                    </div>
                    <?php  } ?>
                    <center>
                        <input type="hidden" name="teacherid" value="<?= $row["tid"] ?>">
                        <button type="submit" name="update" class="btn btn-info">UPDATE</button>    
                    </center>
                </form>
            </div>
        </div>
    </body>
</html>
