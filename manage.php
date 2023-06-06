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
    if (isset($_GET['id'])) {
        require 'include/connection.php';

        $id = addslashes($_GET['id']);
        $sql = "DELETE FROM users WHERE id = ?";
        $stmt = mysqli_stmt_init($con);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            $message = "SERVER ERROR";
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $id);
            if (mysqli_stmt_execute($stmt)) {
                $message = "Successfully Deleted";
            }
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Attendance Portal - Dashboard</title>
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://use.fontawesome.com/208a0b1c3c.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
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
            <h1 class="display-5">Staff Management!</h1>
            <hr class="my-4 mt-0">
            <br>
            <?php
                    echo "
                        <table style=' width: 90%'>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Department</th>
                                <th>Action</th>
                            </tr>
                    ";

                    require 'include/connection.php';
        
                    $sql = "SELECT * FROM `users` WHERE access=20;";
                    // echo $sql;
                    $result = $con->query($sql);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "<tr><td>" . $row["name"]. "</td><td>" . $row['email'] . "</td><td>" . $row['department'] . "</td><td><a href='manage.php?id=".$row['id']."'>delete</a></td></tr>";
                        }
                    } else {
                        echo "0 results";
                    }
                    $con->close();
                    echo "</table><br><br>".$message."";
            ?>
            <br>
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