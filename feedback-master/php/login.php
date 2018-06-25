<?php
	// include "includes/config.php";
	include "includes/sessionUtils.php";
	
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		$session = new sessionUtils();
		$login_reg_num = $_POST["login_reg_num"];
		$login_password = $_POST["login_password"];
		$login_password = $session->encryptIt($login_password);
		$login_error = "";
		
		$login_query = "SELECT * FROM users WHERE regno = '$login_reg_num' AND password = '$login_password'";
		
		$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_BASE) or die("Cannot Connect...");
		
		if ($login_res = mysqli_query($db,$login_query)){
//			$login_res = mysqli_query($db,$login_query);
			if (mysqli_num_rows($login_res) == 1){
				$login_arr = mysqli_fetch_array($login_res);
				$session->UserLogin($login_arr['uid'],$login_arr['regno'],$login_arr['year'],$login_arr['sec'],$login_arr['semester']);
				header("location: ../home.php");
			}else{
				echo '<script> alert("Invalid credentials");</script>';
				echo '<script> window.location="../index.html"; </script>';
			}
		}else{
			echo '<script> alert("Login Error. Please Try Again.");</script>';
			echo '<script> window.location="../index.html"; </script>';
		}
	}
?>