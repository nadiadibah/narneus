<!-- ====================================
Web Name: English Language PPDK
Author: Nadia Adibah bt Rajab
====================================== -->

<?php 
	function kira($sid, $data, $term, $tahun){
		include "../database.php";
		 if($term == 1){
		 	$ops = '<=';
		 }
		 else {
		 	$ops = '>';
		 }

		if($data == "shead"){
			$array = ["hc1q1", "hc1q2", "hc1q3", "hc1q4", "hc1q5", "hc1q6", "hc2q1", "hc2q2", "hc2q3",
                "hc2q4", "hc2q5", "hc2q6", "hc3q1", "hc3q2", "hc3q3", "hc3q4", "hc4q1", "hc4q2", "hc4q3", "hc4q4"];
		}

		else if($data == "sparent"){
			$array = ["pc1q1", "pc1q2", "pc1q3", "pc1q4", "pc1q5", "pc1q6", "pc1q7", "pc1q8", "pc1q9", "pc1q10", "pc1q11","pc2q1", "pc2q2", "pc2q3", "pc2q4", "pc3q1", "pc3q2", "pc3q3", "pc3q4", "pc3q5"];
		}

		else if($data == "steacher"){
			$array = ['tc1q1', 'tc1q2', 'tc1q3', 'tc1q4', 'tc1q5', 'tc1q6', 'tc1q7', 'tc2q1', 'tc2q2', 'tc2q3',
                'tc2q4', 'tc2q5', 'tc2q6', 'tc3q1', 'tc3q2', 'tc3q3', 'tc3q4', 'tc3q5', 'tc3q6', 'tc3q7'];
		}

		else if($data == "sstudent"){
			$array = ['sc1q1', 'sc1q2', 'sc1q3', 'sc1q4', 'sc1q5', 'sc1q6', 'sc1q7', 'sc1q8', 'sc1q9', 'sc1q10', 'sc1q11','sc2q1', 'sc2q2', 'sc2q3', 'sc2q4', 'sc3q1', 'sc3q2', 'sc3q3', 'sc3q4', 'sc3q5'];
		}
	

	$survey = array();
    foreach ($array as $row) {
    	$sql = $conn->prepare("SELECT sum($row) as tambah FROM $data WHERE sid = ? AND month(date) $ops 5 AND year(date) = ?");
		$sql->execute([$sid, $tahun]);

		$tambah = $sql->fetch();
		$survey[] = $tambah['tambah'];
    	}

    $nilai = array_sum($survey);

    $sql2 = $conn->prepare("SELECT count(sid) as bil FROM $data WHERE sid = ? AND month(date) $ops 5 AND year(date) = ?");
    $sql2->execute([$sid, $tahun]);

    $bil = $sql2->fetch();

    $total = $bil['bil'];
    if (!$total){
    	$total2 = 1;
    }
    else {
    	$total2 = $total;
    }

    $divide = round($nilai/$total2);

    return $divide;

	}

function level($score){
	if($score <= 80){
		$level = 1;
	}

	else if($score <= 160 && $score >= 81){
		$level = 2;
	}
	else if($score <= 240 && $score >= 161){
		$level = 3;
	}
	else if($score <= 320 && $score >= 241){
		$level = 4;
	}
	else {
		$level = "It is exceeded the limit.";
	}

	return $level;

}

function percent($actual){
	$amount = round(0.1*$actual);

	return $amount;
}

?>