<?php
	session_start();
	if (isset($_SESSION['id'])) {
		$id = $_SESSION['id'];
		$name = $_SESSION['name'];
		$email = $_SESSION['email'];
		$access = $_SESSION['access'];
		$department = $_SESSION['department'];
	}
?>