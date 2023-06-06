<?php
	
	if (isset($_POST['present_students'])) {

		$present_students = addslashes($_POST['present_students']);
		$department = addslashes($_POST['department']);
		$classes = addslashes($_POST['classes']);
		$shift = addslashes($_POST['shift']);
		$subject = addslashes($_POST['subject']);

	    require 'include/connection.php';
	    
		$sql = "INSERT INTO `student_attendance` (`id`, `department`, `classes`, `shift`, `subject`, `present_students`) VALUES (NULL, ?, ?, ?, ?, ?);";
		$stmt = mysqli_stmt_init($con);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			$message = "SERVER ERROR";
		}
		else {
			mysqli_stmt_bind_param($stmt, "sssss", $department, $classes, $shift, $subject, $present_students);
			if (mysqli_stmt_execute($stmt)) {
				$message = "Successfully Recorded";
			}
		}
	}
	echo $message;
?>