<?php
	include 'includes/config.php';
	session_start();

	$id = $_SESSION["user_id"];
	$regno = $_SESSION["user_regno"];
	$year = $_SESSION["user_year"];
	$sec = $_SESSION["user_sec"];
	$sem = $_SESSION["user_sem"];

	$db = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_BASE) or die("Cannot connect to db..");

	$subject_res = mysqli_query($db,"SELECT * FROM subjects WHERE semester = $sem");
	$subjects_arr = mysqli_fetch_array($subject_res);

	$select_qry = mysqli_query($db, "SELECT * FROM feedback WHERE uid = '$id' AND subid = ".$subjects_arr["subid"]);

	if (mysqli_num_rows($select_qry) == 0) {
		$insertQuery = "INSERT INTO feedback(uid,subid,co1,co2,co3,co4,co5,co6) VALUES($id,".$subjects_arr['subid'].",0,0,0,0,0,0)";
		mysqli_query($db,$insertQuery);
	}
	while ($sub_arr = mysqli_fetch_array($subject_res)) {
		echo "1";
		for ($i=1; $i <= 6; $i++) { 
			$index = $sub_arr["subid"] . "_" . $i;
			echo $index;
			if (isset($_POST[$index])) {
				$updateQuery = "UPDATE feedback SET co".$i." = ".$_POST[$index]." WHERE uid = '$id' AND subid = ".$subjects_arr["subid"];
				echo $updateQuery;
				mysqli_query($db,$updateQuery);
			}else{
	      echo '<script> alert("Error!");</script>';
	      echo '<script> window.location="../home.php"; </script>';
			}
		}
	}
?>