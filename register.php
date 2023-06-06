<?php
    $access = -1;
    include 'include/get-session.php';
    if ($access == 0) {
        header("Location: profile.php");
        exit();
    }
    else if ($access == -1) {
        header("Location: index.php");
        exit();
    }
    $message = "";
    if (isset($_POST['name'])) {
        $name = addslashes($_POST['name']);
        $email = addslashes($_POST['email']);
        $department = addslashes($_POST['department']);
        $simple_password = addslashes($_POST['password']);
        $password = md5($simple_password);

        //CHECK IF EXISTS
        require 'include/connection.php';
        $sql = "SELECT * FROM users WHERE email=?";
        $stmt = mysqli_stmt_init($con);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            $message =  "SERVER ERROR";
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $message = "ERROR: email id is already registered.";
            }
            else{
                // Not Registered
                // Register a new student
                $sql = "INSERT INTO users(name, email, password, department, access) value(?, ?, ?, ?, 20)";
                $stmt = mysqli_stmt_init($con);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    $message = "SERVER ERROR";
                }
                else {
                    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $password, $department);
                    if (mysqli_stmt_execute($stmt)) {
                        $message = "Successfully Register! Your password is ".$simple_password;
                    }
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Attendance Portal - Register Staff</title>
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://use.fontawesome.com/208a0b1c3c.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="fonts/line-awesome/css/line-awesome.min.css">
        <!-- ===== BOX ICONS ===== -->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

        <!-- ===== CSS ===== -->
        <link rel="stylesheet" href="include/css/sidebarstyles.css">
</head>

<body id="body-pd">
    <?php 
        require "include/sidebar.php";
     ?>
    <div class="container-fluid">
        <div class="jumbotron">
            <h1 class="display-5">Create Teacher Profile !</h1>
            <hr class="my-4 mt-0">
            <br>
            <form class="row g-4" method="post">
                <div class="col-md-6">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="eg. Amale Ruchita" required="yes">
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="eg. ruchitaamale.click@gmail" required="yes">
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Department</label>
                    <input type="text" class="form-control" id="department" placeholder="eg. ComputerTechnology" name="department" required="yes">
                </div>
                <div class="col-md-6">
                    <label for="pass" class="form-label">Password</label>
                    <input type="password" class="form-control" id="pass" name="password" required="yes">
                </div>
                <div class="col-md-3 .mx-auto text-center">
                        
                    </div>
                <div class="row" style="padding: 12px; margin: 5px">
                    <div class="col-md-4 .mx-auto text-center">
                        
                    </div>
                    <div class="col-md-4 .mx-auto text-center">
                        <input type="submit" class="btn btn-success form-control" value="Create Profile">
                    </div>
                    <div class="col-md-4 .mx-auto text-center">
                    </div>
                </div>
                <div class="row" style="padding: 12px; margin: 5px">
                    <div class="col-md-12 .mx-auto text-center">
                        <?php echo $message; ?>
                    </div>
                </div>
            </form>
            <br>
        </div>
    </div>
    <div style="color: #fff">
    <?php 
    require 'include/footer.php';
     ?>
     </div>
</body>
</html>