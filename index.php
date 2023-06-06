<?php
	
	$message = "";

	$access = -1;
	include 'include/get-session.php';
	if ($access == 0) {
		header('Location: profile.php');
		exit();
	}
	else if ($access >= 10) {
		header('Location: teacher.php');
		exit();
	}

	if (isset($_POST['email']) && isset($_POST['psw'])) {
		$email = addslashes($_POST['email']);
		$password = md5(addslashes($_POST['psw']));

		// teacher@gmail.com
		// 8d788385431273d11e8b43bb78f3aa41

		require 'include/connection.php';
		
		$sql = "SELECT id,name,email,access,department,password FROM `users` WHERE email=?";
		$stmt = mysqli_stmt_init($con);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			$message =  "Something went wrong!";
		}
		else{
			mysqli_stmt_bind_param($stmt, "s", $email);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if ($row = mysqli_fetch_assoc($result)) {
				if ($row['password'] == $password) {
					$_SESSION['id'] = $row['id'];
					$_SESSION['name'] = $row['name'];
					$_SESSION['email'] = $row['email'];
					$_SESSION['access'] = $row['access'];
					$_SESSION['department'] = $row['department'];

					if ($row['access'] >= 10) {
						header("Location: teacher.php");
						exit();
					}
					else{
						$sql = "SELECT enroll_no FROM `student_register` WHERE email=?";
						$stmt = mysqli_stmt_init($con);
						if (!mysqli_stmt_prepare($stmt, $sql)) {
							$message =  "Something went wrong!";
						}
						else{
							echo $row['email'];
							mysqli_stmt_bind_param($stmt, "s", $row['email']);
							mysqli_stmt_execute($stmt);
							$result1 = mysqli_stmt_get_result($stmt);
							if ($row1 = mysqli_fetch_assoc($result1)) {
								$_SESSION['enroll_no'] = $row1['enroll_no'];
								// echo $row1['enroll_no'];
							}
						}
						header("Location: profile.php");
						exit();	
					}
				}
				else{
					$message = "Invalid username or password";
				}
			}
			else{
				$message = "Invalid username or password";
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Attendance Portal - Home</title>
	 <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://use.fontawesome.com/208a0b1c3c.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>

	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}
		body{
			color: #fff;
		}
		section{
			position: relative;
			height: 100vh;
			width: 100%;
			background: url("images/cover1.jpg");
			background-size: cover;
			background-position: center center;
		}
		.form-container{
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%,-50%);
			background: linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3)rgba(0,0,0,0.3));
			background: rgba(0,0,0,0.4);
			width: 380px;
			padding: 30px 30px;
			border-radius: 10px;
			box-shadow: 7px 7px 60px #000;
		}
		h1{
			text-transform: uppercase;
			font-size: 2em;
			text-align: center;
			margin-bottom: 2em;
		}
		.control input{
			width: 100%;
			display: block;
			padding: 10px;
			color: #222;
			border: none;
			outline: none;
			margin: 1em 0;
		}
		.control input[type="submit"]{
			background: #6351ce;
			color: #fff;
			text-transform: uppercase;
			font-size: 1.2em;
			opacity: .7;
			transition: opacity .3s ease;
		}
		.control input[type="submit"]:hover{
			background-color: solid #6351ce;
			opacity: 1;
			transition: opacity .9s ease;
		}
	</style>
</head>
<body>
	<section>
		<nav class="navbar navbar-dark bg-dark">
  			<div class="container-fluid">
    			<a class="navbar-brand" style="font-size: 1.6rem;" >
    				<img src="images/logo.jpg" alt="" width="45" height="45" class="d-inline-block align-text-top"> Amrut Portal
				</a>
  			</div>
		</nav>
		<div class="form-container">
			<h1>login form</h1>
			<form action="index.php" method="POST">
				<div class="control">
					<label for="name">Email</label>
					<input type="email" name="email" id="email" placeholder="Email">
				</div>
				<div class="control">
					<label for="psw">Password</label>
					<input type="password" name="psw" id="psw" placeholder="Password">
				</div>
				<div class="control">
					<center style="color:red"><?php echo $message; ?></center>
					<input type="submit" value="Login">
				</div>
			</form>
		</div>
	</section>
<?php 
require 'include/footer.php';
 ?>
</body>
</html>