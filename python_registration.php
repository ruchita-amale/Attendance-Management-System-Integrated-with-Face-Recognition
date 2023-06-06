<?php
	
	function generateRandomString($length = 8) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}

	if (isset($_POST['name'])) {
		$name = addslashes($_POST['name']);
	    $address = addslashes($_POST['address']);
	    $email = addslashes($_POST['email']);
	    $simple_password = generateRandomString();
	    $password = md5(addslashes($simple_password));
	    $enroll_no = addslashes($_POST['enroll_no']);
	    $roll_no = addslashes($_POST['roll_no']);
	    $mobile_no = addslashes($_POST['mobile_no']);
	    $department = addslashes($_POST['department']);
	    $semester = addslashes($_POST['semester']);
	    $shift = addslashes($_POST['shift']);

	    require 'include/connection.php';
	    
	    //CHECK IF EXISTS
		$sql = "SELECT * FROM student_register WHERE enroll_no=?";
		$stmt = mysqli_stmt_init($con);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			$message =  "SERVER ERROR";
		}
		else {
			mysqli_stmt_bind_param($stmt, "s", $enroll_no);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if ($row = mysqli_fetch_assoc($result)) {
				$message = "ERROR: Enrollment number is already registered.";
			}
			else{
				// Not Registered
				// Register a new student
				$sql = "INSERT INTO student_register(name, address, email, password, enroll_no, roll_no, mobile_no, department, semester, shift) value(?,?,?,?,?,?,?,?,?,?)";
				$stmt = mysqli_stmt_init($con);
				if (!mysqli_stmt_prepare($stmt, $sql)) {
					$message = "SERVER ERROR";
				}
				else {
					mysqli_stmt_bind_param($stmt, "ssssssssss", $name, $address, $email, $password, $enroll_no, $roll_no, $mobile_no, $department, $semester, $shift);
					if (mysqli_stmt_execute($stmt)) {
						$message = "Successfully Register! Your password is ".$simple_password;
					}
				}
			}
		}
	}
	echo $message;
?>