<?php
	// include "includes/config.php";
	include "includes/sessionUtils.php";
	
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		
		$session = new sessionUtils();
		
		$reg_name= $_POST["reg_name"];
		$reg_email=$_POST["reg_email"];
		$reg_reg_num=$_POST["reg_reg_num"];
		$reg_year=$_POST["reg_year"];
		$reg_sec=$_POST["reg_sec"];		
		$reg_semester=$_POST["reg_semester"];
		$reg_password=$_POST["reg_password"];
		$reg_password = $session->encryptIt($reg_password);
		$reg_repassword=$_POST["reg_repassword"];
		$reg_repassword = $session->encryptIt($reg_repassword);
		
		$select_query = "SELECT * FROM users WHERE regno = '$reg_reg_num'";
		
		$register_query = "INSERT INTO users(name,year,sec,email,semester,password,regno) VALUES ('$reg_name','$reg_year','$reg_sec','$reg_email','$reg_semester','$reg_password','$reg_reg_num')";
		
		$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_BASE) or die("Cannot Connect...");
		
		if ($reg_password == $reg_repassword){
			if (mysqli_num_rows(mysqli_query($db,$select_query)) == 0){
				if (mysqli_query($db,$register_query)){
					echo '<script> alert("User registered successfully.");</script>';
					echo '<script> window.location="../index.html"; </script>';
				}else{
					echo '<script> alert("User registration falied.");</script>';
					echo '<script> window.location="../index.html"; </script>';
				}
			}else{
				echo '<script> alert("User already exists.");</script>';
				echo '<script> window.location="../index.html"; </script>';
			}
		}else{
			echo '<script> alert("Passwords doesnot match.");</script>';
			echo '<script> window.location="../index.html"; </script>';
		}
	}
?>