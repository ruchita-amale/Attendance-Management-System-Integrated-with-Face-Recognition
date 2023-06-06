<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Attendance Portal - Profile</title>
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://use.fontawesome.com/208a0b1c3c.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
        <!-- ===== BOX ICONS ===== -->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

        <!-- ===== CSS ===== -->
        <link rel="stylesheet" href="include/css/sidebarstyles.css">
</head>

<body id="body-pd">
    <?php 
        require "include/sidebar.php";
     ?>
    <br>
    <div class="container-fluid">
        
            <div class="row">
            <div class="col-lg-3 .mx-auto text-center"></div>
            <div class="col-lg-6 .mx-auto text-center">
                <div class="jumbotron">
                <form>
                    <fieldset>
                        <legend  style="background-color: #fff; border-radius: 12px; width: 100%; padding: 12px;">DETAILS</legend><br>
                        <i class="bi bi-person-circle" style="font-size: 70px"></i><br>
                    <label>Name: <?php echo $_SESSION['name']; ?></label>
                    <br><label>Email: <?php echo $_SESSION['email']; ?></label>
                    <br><label>Department: <?php echo $_SESSION['department']; ?></label>
                    <br><label>Access: 
                        <?php 
                            if ($_SESSION['access'] >= 30) {
                                echo "Admin";
                            }
                            else if ($_SESSION['access'] == 20) {
                                echo "Teacher";
                            }
                            else{
                                echo "Student";
                            }
                            // echo $_SESSION['access']; 
                        ?>
                        </label>
                    <br>
                    </fieldset>
                </form>
                <?php
                    require 'include/connection.php';

                    if ($_SESSION['access'] == 0) {
                        $sql = "SELECT DISTINCT department, classes, shift, subject FROM `student_attendance` WHERE present_students LIKE '%".$_SESSION['enroll_no']."%' ORDER BY date DESC;";
                        // echo $sql;
                        $result = $con->query($sql);
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                $subject = $row['subject'];
                                $result1=$con->query("SELECT count(*) as total from `student_attendance` WHERE subject='".$subject."'");
                                $data=$result1->fetch_assoc();
                                $total = $data['total'];
                                $result2=$con->query("SELECT count(*) as attend from `student_attendance` WHERE subject='".$subject."' AND present_students LIKE '%".$_SESSION['enroll_no']."%' ");
                                $data2=$result2->fetch_assoc();
                                $attend = $data2['attend'];
                                echo "Subject: " . $subject . " | Total Lectures: " . $total .  " | Attended Lectures: " . $attend." | Percentage: " . strval(($attend/$total)*100) . "% <br>";
                            }
                        } 
                        else {
                            echo "No subject attend";
                        }

                        $con->close();
                    }
                ?>
            </div>
            </div> 
            <div class="col-lg-3 .mx-auto text-center"></div>
    </div>
    <div style="color: #fff">
    <?php 
    require 'include/footer.php';
     ?>
     </div>
</body>
</html>