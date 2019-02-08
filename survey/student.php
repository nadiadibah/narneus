<!DOCTYPE html>
<!-- ====================================
Web Name: English Language PPDK
Author: Nadia Adibah bt Rajab
====================================== -->

<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Students Assessment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style>
        .i{
            font-style:italic;
        }
        .blue, th{
            background-color:lightblue;
        }
        .grey{
            background-color:lightgrey;
        }
        .center{
            text-align:center;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h2 style="text-align:center;">Students Assessment</h2>
    </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th></th>
                    <th>Statement <p class="i">Pernyataan</p></th>
                    <th>Not At All <p class="i">Tiada</p> 0 </th>
                    <th>Seldom <p class="i">Jarang</p> 1 </th>
                    <th>Sometimes <p class="i">Kadang-Kadang</p> 2 </th>
                    <th>Often <p class="i">Kerap</p> 3 </th>
                    <th>Very Often <p class="i">Sangat Kerap</p> 4 </th>
                </tr>
            </thead>
            <tbody>
                <tr class="blue">
                    <td colspan="7">Choose the scale of 0 - 4 to rate each of the statements below. 
                        <p class="i">Pilih pada skala 0 - 4 berdasarkan pernyataan dibawah.</p></td>
                </tr>

                <!--============= Question for C1 =============-->
                <tr>
                    <td colspan="7"><b>C1: Create an English Environment/
                        <p class="i">Mewujudkan Persekitaran Bahasa Inggeris</p></b></td>
                </tr>
                <tr>
                    <td></td>
                    <td>I speak in English
                        <p class="i">Saya bercakap dalam Bahasa Inggeris</p></td>
                    <td colspan="6" class="grey"></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>a. in class <p class="i">a. dalam bilik darjah</p></td>
                    <td class="center"><input type="radio" name="sc1q1" value="0"></td>
                    <td class="center"><input type="radio" name="sc1q1" value="1"></td>
                    <td class="center"><input type="radio" name="sc1q1" value="2"></td>
                    <td class="center"><input type="radio" name="sc1q1" value="3"></td>
                    <td class="center"><input type="radio" name="sc1q1" value="4"></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>b. out of class <p class="i">b. di luar bilik darjah</p></td>
                    <td class="center"><input type="radio" name="sc1q2" value="0"></td>
                    <td class="center"><input type="radio" name="sc1q2" value="1"></td>
                    <td class="center"><input type="radio" name="sc1q2" value="2"></td>
                    <td class="center"><input type="radio" name="sc1q2" value="3"></td>
                    <td class="center"><input type="radio" name="sc1q2" value="4"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>I speak in English with
                        <p class="i">Saya bercakap dalam Bahasa Inggeris dengan</p></td>
                    <td colspan="6" class="grey"></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>a. friends<p class="i">a. kawan-kawan</p></td>
                    <td class="center"><input type="radio" name="sc1q3" value="0"></td>
                    <td class="center"><input type="radio" name="sc1q3" value="1"></td>
                    <td class="center"><input type="radio" name="sc1q3" value="2"></td>
                    <td class="center"><input type="radio" name="sc1q3" value="3"></td>
                    <td class="center"><input type="radio" name="sc1q3" value="4"></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>b. teachers<p class="i">b. guru-guru</p></td>
                    <td class="center"><input type="radio" name="sc1q4" value="0"></td>
                    <td class="center"><input type="radio" name="sc1q4" value="1"></td>
                    <td class="center"><input type="radio" name="sc1q4" value="2"></td>
                    <td class="center"><input type="radio" name="sc1q4" value="3"></td>
                    <td class="center"><input type="radio" name="sc1q4" value="4"></td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>c. parents<p class="i">b. ibu bapa</p></td>
                    <td class="center"><input type="radio" name="sc1q5" value="0"></td>
                    <td class="center"><input type="radio" name="sc1q5" value="1"></td>
                    <td class="center"><input type="radio" name="sc1q5" value="2"></td>
                    <td class="center"><input type="radio" name="sc1q5" value="3"></td>
                    <td class="center"><input type="radio" name="sc1q5" value="4"></td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>d. other people around me<p class="i">b. orang lain</p></td>
                    <td class="center"><input type="radio" name="sc1q6" value="0"></td>
                    <td class="center"><input type="radio" name="sc1q6" value="1"></td>
                    <td class="center"><input type="radio" name="sc1q6" value="2"></td>
                    <td class="center"><input type="radio" name="sc1q6" value="3"></td>
                    <td class="center"><input type="radio" name="sc1q6" value="4"></td> 
                </tr>
                <tr>
                    <td>7</td>
                    <td>I encourage my friends to speak English.
                        <p class="i">Saya menggalakkan kawan-kawan saya bercakap dalam Bahasa Inggeris.</p></td>
                    <td class="center"><input type="radio" name="sc1q7" value="0"></td>
                    <td class="center"><input type="radio" name="sc1q7" value="1"></td>
                    <td class="center"><input type="radio" name="sc1q7" value="2"></td>
                    <td class="center"><input type="radio" name="sc1q7" value="3"></td>
                    <td class="center"><input type="radio" name="sc1q7" value="4"></td> 
                </tr>
                <tr>
                    <td></td>
                    <td>I carry out English activities with
                        <p class="i">Saya melaksanakan aktiviti-aktiviti Bahasa Inggeris dengan</p></td>
                    <td colspan="6" class="grey"></td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>a. friends<p class="i">a. kawan-kawan</p></td>
                    <td class="center"><input type="radio" name="sc1q8" value="0"></td>
                    <td class="center"><input type="radio" name="sc1q8" value="1"></td>
                    <td class="center"><input type="radio" name="sc1q8" value="2"></td>
                    <td class="center"><input type="radio" name="sc1q8" value="3"></td>
                    <td class="center"><input type="radio" name="sc1q8" value="4"></td> 
                </tr>
                <tr>
                    <td>9</td>
                    <td>b. teachers<p class="i">b. guru-guru</p></td>
                    <td class="center"><input type="radio" name="sc1q9" value="0"></td>
                    <td class="center"><input type="radio" name="sc1q9" value="1"></td>
                    <td class="center"><input type="radio" name="sc1q9" value="2"></td>
                    <td class="center"><input type="radio" name="sc1q9" value="3"></td>
                    <td class="center"><input type="radio" name="sc1q9" value="4"></td>
                </tr>
                <tr>
                    <td>10</td>
                    <td>c. parents<p class="i">b. ibu bapa</p></td>
                    <td class="center"><input type="radio" name="sc1q10" value="0"></td>
                    <td class="center"><input type="radio" name="sc1q10" value="1"></td>
                    <td class="center"><input type="radio" name="sc1q10" value="2"></td>
                    <td class="center"><input type="radio" name="sc1q10" value="3"></td>
                    <td class="center"><input type="radio" name="sc1q10" value="4"></td>
                </tr>
                <tr>
                    <td>11</td>
                    <td>d. other people around me<p class="i">b. orang lain</p></td>
                    <td class="center"><input type="radio" name="sc1q11" value="0"></td>
                    <td class="center"><input type="radio" name="sc1q11" value="1"></td>
                    <td class="center"><input type="radio" name="sc1q11" value="2"></td>
                    <td class="center"><input type="radio" name="sc1q11" value="3"></td>
                    <td class="center"><input type="radio" name="sc1q11" value="4"></td> 
                </tr>

                <!--============= Question for C2 =============-->
                <tr>
                    <td colspan="7"><b>C2: Build Confidence to use English/
                        <p class="i">Membina Keyakinan untuk menggunakan Bahasa Inggeris</p></b></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>I take part in English activities in my school.
                        <p class="i">Saya mengambil bahagian dalam aktiviti-aktiviti Bahasa Inggeris di sekolah.</p></td>
                    <td class="center"><input type="radio" name="sc2q1" value="0"></td>
                    <td class="center"><input type="radio" name="sc2q1" value="1"></td>
                    <td class="center"><input type="radio" name="sc2q1" value="2"></td>
                    <td class="center"><input type="radio" name="sc2q1" value="3"></td>
                    <td class="center"><input type="radio" name="sc2q1" value="4"></td> 
                </tr>
                <tr>
                    <td>2</td>
                    <td>I take part in English competitions.
                        <p class="i">Saya mengambil bahagian dalam pertandingan-pertandingan Bahasa Inggeris.</p></td>
                    <td class="center"><input type="radio" name="sc2q2" value="0"></td>
                    <td class="center"><input type="radio" name="sc2q2" value="1"></td>
                    <td class="center"><input type="radio" name="sc2q2" value="2"></td>
                    <td class="center"><input type="radio" name="sc2q2" value="3"></td>
                    <td class="center"><input type="radio" name="sc2q2" value="4"></td> 
                </tr>
                <tr>
                    <td>3</td>
                    <td>I am interested to take part in English language activities in the school.
                        <p class="i">Saya berminat mengambil bahagian dalam aktiviti-aktiviti Bahasa Inggeris di sekolah.</p></td>
                    <td class="center"><input type="radio" name="sc2q3" value="0"></td>
                    <td class="center"><input type="radio" name="sc2q3" value="1"></td>
                    <td class="center"><input type="radio" name="sc2q3" value="2"></td>
                    <td class="center"><input type="radio" name="sc2q3" value="3"></td>
                    <td class="center"><input type="radio" name="sc2q3" value="4"></td> 
                </tr>
                <tr>
                    <td>4</td>
                    <td>I am interested to take part in English language competitions.
                        <p class="i">Saya berminat mengambil bahagian dalam pertandingan-pertandingan Bahasa Inggeris.</p></td>
                    <td class="center"><input type="radio" name="sc2q4" value="0"></td>
                    <td class="center"><input type="radio" name="sc2q4" value="1"></td>
                    <td class="center"><input type="radio" name="sc2q4" value="2"></td>
                    <td class="center"><input type="radio" name="sc2q4" value="3"></td>
                    <td class="center"><input type="radio" name="sc2q4" value="4"></td> 
                </tr>
                
                
                <!--============= Question for C3 =============-->
                <tr>
                    <td colspan="7"><b>C3: Involvement in Self Development and Studies/
                        <p class="i">Penglibatan dalam Pembangunan Kendiri dan Pembelajaran</p></b></td>
                </tr>
                <tr>
                    <td></td>
                    <td>To improve my English
                        <p class="i">Bagi memperbaiki tahap Bahasa Inggeris</p></td>
                    <td colspan="6" class="grey"></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>a. I listen to English songs
                        <p class="i">Saya mendengar lagu Bahasa Inggeris</p></td>
                    <td class="center"><input type="radio" name="sc3q1" value="0"></td>
                    <td class="center"><input type="radio" name="sc3q1" value="1"></td>
                    <td class="center"><input type="radio" name="sc3q1" value="2"></td>
                    <td class="center"><input type="radio" name="sc3q1" value="3"></td>
                    <td class="center"><input type="radio" name="sc3q1" value="4"></td> 
                </tr>
                <tr>
                    <td>2</td>
                    <td>b. I read English books/comics
                        <p class="i">Saya membaca buku-buku/komik-komik dalam Bahasa Inggeris</p></td>
                    <td class="center"><input type="radio" name="sc3q2" value="0"></td>
                    <td class="center"><input type="radio" name="sc3q2" value="1"></td>
                    <td class="center"><input type="radio" name="sc3q2" value="2"></td>
                    <td class="center"><input type="radio" name="sc3q2" value="3"></td>
                    <td class="center"><input type="radio" name="sc3q2" value="4"></td> 
                </tr>
                <tr>
                    <td>3</td>
                    <td>c. I watch English movies/cartoons/videos
                    <p class="i">Saya menonton filem-filem/kartun-kartun/video-video Bahasa Inggeris</p></td>
                    <td class="center"><input type="radio" name="sc3q3" value="0"></td>
                    <td class="center"><input type="radio" name="sc3q3" value="1"></td>
                    <td class="center"><input type="radio" name="sc3q3" value="2"></td>
                    <td class="center"><input type="radio" name="sc3q3" value="3"></td>
                    <td class="center"><input type="radio" name="sc3q3" value="4"></td> 
                </tr>
                <tr>
                    <td>4</td>
                    <td>d. I use social media (Facebook, Whatsapp, Blog, Twitter, Instagram)
                        <p class="i">Saya menggunakan media sosial (Facebook, Whatsapp, Blog, Twitter, Instagram)</p></td>
                    <td class="center"><input type="radio" name="sc3q4" value="0"></td>
                    <td class="center"><input type="radio" name="sc3q4" value="1"></td>
                    <td class="center"><input type="radio" name="sc3q4" value="2"></td>
                    <td class="center"><input type="radio" name="sc3q4" value="3"></td>
                    <td class="center"><input type="radio" name="sc3q4" value="4"></td> 
                </tr>
                <tr>
                    <td>5</td>
                    <td>I teach my friends to learn English.
                        <p class="i">Saya mengajar kawan-kawan saya berbahasa Inggeris.</p></td>
                    <td class="center"><input type="radio" name="sc3q5" value="0"></td>
                    <td class="center"><input type="radio" name="sc3q5" value="1"></td>
                    <td class="center"><input type="radio" name="sc3q5" value="2"></td>
                    <td class="center"><input type="radio" name="sc3q5" value="3"></td>
                    <td class="center"><input type="radio" name="sc3q5" value="4"></td> 
                </tr>
            </tbody>
        </table>
</div>
</body>
</html>