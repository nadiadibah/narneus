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
include "sidebar.php";
include "scriptlink.php";
include "footer.php";
?>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
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
        <title>Teacher Registration</title>
    </head>
    
    <body>
        <!--========================== content ===============================-->
        <div class="main">
            <div class="container-fluid">
                <br>
                <center><h2>NEW REGISTRATION</h2></center>
                <br>
                <form class="card border-dark" action="add.php" method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Full Name</label>
                            <p class="a">Nama Penuh</p>
                            <input type="text" class="form-control" name="name" placeholder="Name">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Identity Card Number</label>
                            <p class="a">Nombor Kad Pengenalan</p>
                            <input type="number" class="form-control" name="ic" placeholder="NRIC">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Phone Number</label>
                            <p class="a">Nombor telefon</p>
                            <input type="number" class="form-control" name="phone" placeholder="Phone">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Email</label>
                            <p class="a">Email</p>
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Home Address</label>
                        <p class="a">Alamat Rumah</p>
                        <input type="text" class="form-control" name="address" placeholder="No. 00, jalan 123">
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>City</label>
                            <p class="a">Bandar/Daerah</p>
                            <input type="text" class="form-control" name="city">
                        </div>
                        <div class="form-group col-md-5">
                            <label>State</label>
                            <p class="a">Negeri</p>
                            <select name="state" class="form-control">
                                <option selected>--State--</option>
                                <option value="Johor">Johor</option>
                                <option value="Melaka">Melaka</option>
                                <option value="Negeri Sembilan">Negeri Sembilan</option>
                                <option value="Selangor">Selangor</option>
                                <option value="Pahang">Pahang</option>
                                <option value="Perak">Perak</option>
                                <option value="Pulau Pinang">Pulau Pinang</option>
                                <option value="Perlis">Perlis</option>
                                <option value="Kedah">Kedah</option>
                                <option value="Kelantan">Kelantan</option>
                                <option value="Terengganu">Terengganu</option>
                                <option value="Sabah">Sabah</option>
                                <option value="Sarawak">Sarawak</option>
                                <option value="WPKL">Wilayah Persekutuan Kuala Lumpur</option>
                                <option value="WPP">Wilayah Persekutuan Putrajaya</option>
                                <option value="WPL">Wilayah Persekutuan Labuan</option>
                          </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Postcode</label>
                            <p class="a">Poskod</p>
                            <input type="number" class="form-control" name="poscode">
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
                                    <input type="radio" id="option" name="option" class="custom-control-input" value="Yes">
                                    <label class="custom-control-label" for="option">Yes<p class="a">Ya</p></label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="option2" name="option" class="custom-control-input" value="No">
                                    <label class="custom-control-label" for="option2">No<p class="a">Bukan</p></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <label>Muet Band</label>
                            <p class="a">Band Muet</p>
                        </div>
                        <div class="form-group col-md-2">
                           <select name="muet" class="form-control">
                                <option selected>--Band--</option>
                                <option value="1">Band 1</option>
                                <option value="2">Band 2</option>
                                <option value="3">Band 3</option>
                                <option value="4">Band 4</option>
                                <option value="5">Band 5</option>
                                <option value="6">Band 6</option>
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
                                    <input type="radio" id="cpt" name="cpt" class="custom-control-input" value="Yes">
                                    <label class="custom-control-label" for="cpt">Yes<p class="a">Ada</p></label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="cpt2" name="cpt" class="custom-control-input" value="No">
                                    <label class="custom-control-label" for="cpt2">No<p class="a">Tiada</p></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <label>CPT/APTIS Band</label>
                            <p class="a">Band CPT/APTIS</p>
                        </div>
                        <div class="form-group col-md-2">
                           <select name="cptb" class="form-control">
                                <option selected>--Band--</option>
                                <option value="A1">A1</option>
                                <option value="A2">A2</option>
                                <option value="B1">B1</option>
                                <option value="B2">B2</option>
                                <option value="C1">C1</option>
                                <option value="C2">C2</option>
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
                                    <input type="radio" id="elt" name="elt" class="custom-control-input" value="Yes">
                                    <label class="custom-control-label" for="elt">Yes<p class="a">Ada</p></label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="elt2" name="elt" class="custom-control-input" value="No">
                                    <label class="custom-control-label" for="elt2">No<p class="a">Tiada</p></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Pro-ELT Course (Year)</label>
                            <p class="a">Tahun Menghadiri Kursus Pro-ELT</p>
                        </div>
                        <div class="form-group col-md-2">
                           <select name="yelt"  class="form-control"> 
                                <option value="0">--Year--</option>
                                <?php
                                    for ($x = 2013; $x <= date(Y); $x++) {
                                    echo "<option value=".$x.">$x</option>";
                                    } 
                                ?>
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
                                    <input type="radio" id="marker" name="marker" class="custom-control-input" value="Yes">
                                    <label class="custom-control-label" for="marker">Yes<p class="a">Ya</p></label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="marker2" name="marker" class="custom-control-input" value="No">
                                    <label class="custom-control-label" for="marker2">No<p class="a">Bukan</p></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-1">
                            <label>Position</label>
                            <p class="a">Jawatan</p>
                        </div>
                        <div class="form-group col-md-3">
                           <select name="position" class="form-control">
                                <option selected>--Choose/Pilih--</option>
                                <option value="principal">Principal/Pengetua</option>
                                <option value="GKMP">Senior Assistant/ GKMP</option>
                                <option value="hod">Head of Panel/Ketua Panitia</option>
                                <option value="PPMP">PPMP</option>
                                <option value="teacher">Teacher/Guru Biasa</option>
                          </select>
                        </div>
                    </div>

                    <div class="form-row form-group">
                        <div class="form-group col-md-2">
                            <label>Class</label>
                            <p class="a">Kelas Mengajar</p>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="yot" name="yot[]" value="1">
                                <label class="custom-control-label" for="yot">Year/Form 1<p class="a">Tahun/Tingkatan 1</p></label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="yot2" name="yot[]" value="2">
                                <label class="custom-control-label" for="yot2">Year/Form 2<p class="a">Tahun/Tingkatan 2</p></label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="yot3" name="yot[]" value="3">
                                <label class="custom-control-label" for="yot3">Year/Form 3<p class="a">Tahun/Tingkatan 3</p></label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="yot4" name="yot[]" value="4">
                                <label class="custom-control-label" for="yot4">Year/Form 4<p class="a">Tahun/Tingkatan 4</p></label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="yot5" name="yot[]" value="5">
                                <label class="custom-control-label" for="yot5">Year/Form 5<p class="a">Tahun/Tingkatan 5</p></label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="yot6" name="yot[]" value="6">
                                <label class="custom-control-label" for="yot6">Year/Form 6<p class="a">Tahun/Tingkatan 6</p></label>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <label>Teaching Experience</label>
                            <p class="a">Pengalaman Mengajar</p>
                        </div>
                        <div class="form-group col-md-3">
                            <input type="text" class="form-control" name="exp" placeholder="Year/Tahun">
                        </div>
                    </div>

                    <input type="hidden" name ="sid" value="<?= $user ?>"> 
                    <br>
                    <center>
                        <button type="submit" name="submit" class="btn btn-info" value="submit">SUBMIT</button>    
                    </center>
                </form>
            </div>
        </div>
    </body>
</html>