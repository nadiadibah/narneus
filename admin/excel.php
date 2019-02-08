<?php  
include "../database.php";
include "../survey/calculate.php";

@$year = $_GET['tahun'];
@$term = $_GET['term'];
if($term == 1){
    $ops = '<=';
}
else {
    $ops = '>';
}

@$level = $_GET['level'];
if($level == "SK"){
    $lol = '<';
}
else {
    $lol = '>=';
}

$output = '';

//export to excel for result
if(isset($_POST["export"]))
{

  $output .= '
  <table>
    <thead>
    <tr>
        <th>'.$year.'</th>
        <th>'.$term.'</th>
        <th>'.$level.'</th>
    </tr>
        <tr>
            <th rowspan="2">No.</th>
            <th rowspan="2">School Name</th>
            <th colspan="4">Mean Score</th>
            <th rowspan="2">Total Score</th>
            <th rowspan="2">Level of Immersiveness</th>
        </tr>
        <tr>
            <th>School Head</th>
            <th>Parents and Community</th>
            <th>Teachers</th>
            <th>Students</th>
        </tr>
    </thead>
  ';
    $count=1;
    $sql = $conn->query("SELECT * FROM emis WHERE JENIS $lol 200 ORDER BY NAMASEKOLAH ASC");
    while ($row = $sql->fetch()) { 
    
    $output .= '
        <tr>  
            <td>'.$count.'</td>';

    $shead = kira($row['KODSEKOLAH'], 'shead', $term, $year);
    $sparent = kira($row['KODSEKOLAH'], 'sparent', $term, $year);
    $steacher = kira($row['KODSEKOLAH'], 'steacher', $term, $year);
    $sstudent = kira($row['KODSEKOLAH'], 'sstudent', $term, $year);
    $score = $shead+$sparent+$steacher+$sstudent;

    $output .= '<td>'.$row['NAMASEKOLAH'] .'</td> 
            <td>'.$shead.'</td>
            <td>'.$sparent.'</td>
            <td>'.$steacher.'</td>
            <td>'.$sstudent.'</td>
            <td>'.$score.'</td>
            <td>'.level($score).'</td>
        </tr>
   ';
  $count++; }

  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=result.xls');
  echo $output;

}

//export to excel for respondent
if(isset($_POST["exportwo"]))
{

  $output .= '
   <table> 
        <thead>
            <tr>
                <th rowspan="2">No.</th>
                <th rowspan="2">School Name</th>
                <th colspan="4">Target Respondent</th>
                <th colspan="4">Exact Respondent</th>
            </tr>
            <tr>
                <th>School Head</th>
                <th>Teacher</th>
                <th>Student</th>
                <th>Parent</th>
                <th>School Head</th>
                <th>Teacher</th>
                <th>Student</th>
                <th>Parent</th>
            </tr>
        </thead>
  ';

    $count=1;
        $sql = $conn->query("SELECT * FROM emis WHERE JENIS $lol 200 ORDER BY NAMASEKOLAH ASC");
        while ($row = $sql->fetch ()){
            $sid = $row['KODSEKOLAH']; 
            $name = $row['NAMASEKOLAH'];

            $exact = $conn->prepare("SELECT * FROM percent WHERE sid = ? AND year = ? AND term = ?");
            $exact->execute([$sid, $year, $term]);
            $row2 = $exact->fetch();

            $ahead = $row2['ahead'];
            $aparent = $row2['aparent'];
            $ateacher = percent($row2['ateacher']);
            $astudent = percent($row2['astudent']);
    
    $output .= '<tr>
                    <td>'.$count.'</td>
                    <td>'.$name.'</td>
                    <td>'.$ahead.'</td>
                    <td>'.$ateacher.'</td>
                    <td>'.$astudent.'</td>
                    <td>'.$aparent.'</td>
   ';

    $sql2 = $conn->prepare("SELECT count(sid) as sekolah FROM shead WHERE sid =? AND month(date) $ops 5 AND year(date) = ?");
    $sql2->execute([$sid, $year]);
    $row2 = $sql2->fetch();
    $output .='<td>'.$row2['sekolah'].'</td>';

    $sql2 = $conn->prepare("SELECT count(sid) as sekolah FROM steacher WHERE sid =? AND month(date) $ops 5 AND year(date) = ?");
    $sql2->execute([$sid, $year]);
    $row2 = $sql2->fetch();
    $output .='<td>'.$row2['sekolah'].'</td>';

    $sql2 = $conn->prepare("SELECT count(sid) as sekolah FROM sstudent WHERE sid =? AND month(date) $ops 5 AND year(date) = ?");
    $sql2->execute([$sid, $year]);
    $row2 = $sql2->fetch();
    $output .='<td>'.$row2['sekolah'].'</td>';

    $sql2 = $conn->prepare("SELECT count(sid) as sekolah FROM sparent WHERE sid =? AND month(date) $ops 5 AND year(date) = ?");
    $sql2->execute([$sid, $year]);
    $row2 = $sql2->fetch();
    $output .='<td>'.$row2['sekolah'].'</td>';

    $count++; }

    $output .= '</tr></tbody>';

  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=respondent.xls');
  echo $output;

}
?>
