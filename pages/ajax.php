<?php
	$db = mysqli_connect('localhost','cdwskse14810','39c4b83e54','cdwskse14810');
	mysqli_query($db,'SET NAMES utf8');

	$query = mysqli_query($db,'SELECT * FROM `Dresses_'.mysqli_real_escape_string($db,$_GET['Lang']).'`');

	$dresses = array();
	$i = 0;
	while ($dress = mysqli_fetch_assoc($query)) {
		$dresses[$i] = $dress;
		if ($dress['Id']==$_GET['Dress']) {
			$geti = $i;
		}
		$i++;
	}
	if ($_GET['Vector']=='next') {
		if ($geti != count($dresses)-1) {
			echo json_encode($dresses[$geti+1]);
		} else {
			echo json_encode($dresses[0]);
		}
	} else {
		if ($geti != 0) {
			echo json_encode($dresses[$geti-1]);
		} else {
			echo json_encode($dresses[count($dresses)-1]);
		}
	}
?>