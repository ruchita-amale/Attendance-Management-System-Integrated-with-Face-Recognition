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
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Attendance</title>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body id="body-pd" style="">
    <?php 
        require "include/sidebar.php";
     ?>
    <div class="container-fluid">
        <div class="jumbotron">
            <h1 class="display-5">View Attendance</h1>
            <hr class="my-4 mt-0">
            <br>
            <?php
                if (isset($_GET['department'])) {
                    $department = addslashes($_GET['department']);
                    $classes = addslashes($_GET['class']);
                    $shift = addslashes($_GET['shift']);
                    $subject = addslashes($_GET['subject']);

                    echo "<h5>
                            department: ".$department."<br>
                            class: ".$classes."<br>
                            shift: ".$shift."<br>
                            subject: ".$subject."<br>
                        </h5>
                        <br>
                        <table style=' width: 90%'>
                            <tr>
                                <th>date</th>
                                <th>present_students</th>
                            </tr>
                    ";

                    require 'include/connection.php';
        
                    $sql = "SELECT * FROM `student_attendance` WHERE department='".$department."' AND classes='".$classes."' AND shift='".$shift."' AND subject='".$subject."' ORDER BY date DESC;";
                    // echo $sql;
                    $result = $con->query($sql);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "<tr><td>" . $row["date"]. "</td><td>" . $row['present_students'] . "</td></tr>";
                        }
                    } else {
                        echo "0 results";
                    }
                    $con->close();
                    echo "</table>";
                }
            ?>
            <br>
            <a href="view.php">Select other subject.</a>
            <br>
            <br>
        </div>
    </div>
    <div style="color: #fff" style="margin: 0px; padding: 0px;">
    <?php 
    require 'include/footer.php';
     ?>
     </div>
     <script type="text/javascript">
        function choose(){
            var sel = document.getElementById('department').value;
                if (sel == "select"){
                    document.getElementById("class").innerHTML = "<option value= ''>--Select--</option>";     
                }
                if (sel == "ComputerTechnology"){
                    document.getElementById("class").innerHTML = "<option value= ''>--Select--</option><option value= 'CM1I'>CM1I</option><option value= 'CM2I'>CM2I</option><option value= 'CM3I'>CM3I</option><option value= 'CM4I'>CM4I</option><option value= 'CM5I'>CM5I</option><option value= 'CM6I'>CM6I</option>";     
                }
                if (sel == "Mechanical"){
                    document.getElementById("class").innerHTML = "<option value = ''>--Select--</option><option value= 'ME1I'>ME1I</option><option value= 'ME2I'>ME2I</option><option value= 'ME3I'>ME3I</option><option value= 'ME4I'>ME4I</option><option value= 'ME5I'>ME5I</option><option value= 'ME6I'>ME6I</option>";     
                }
                if (sel == "InformationTechnology"){
                    document.getElementById("class").innerHTML = "<option value= ''>--Select--</option><option value= 'IT1I'>IT1I</option><option value= 'IT2I'>IT2I</option><option value= 'IT3I'>IT3I</option><option value= 'IT4I'>IT4I</option><option value= 'IT5I'>IT5I</option><option value= 'IT6I'>IT6I</option>";     
                }

                if (sel == "Civil"){
                    document.getElementById("class").innerHTML = "<option >--Select--</option><option value= 'CV1I'>CV1I</option><option value= 'CV2I'>CV2I</option><option value= 'CV3I'>CV3I</option><option value= 'CV4I'>CV4I</option><option value= 'CV5I'>CV5I</option><option value= 'CV6I'>CV6I</option>";     
                }
                if (sel == "Automobile"){
                    document.getElementById("class").innerHTML = "<option value= ''>--Select--</option><option value= 'AM1I'>AM1I</option><option value= 'AM2I'>AM2I</option><option value= 'AM3I'>AM3I</option><option value= 'AM4I'>AM4I</option><option value= 'AM5I'>AM5I</option><option value= 'AM6I'>AM6I</option>";     
                }
                if (sel == "E&TC"){
                    document.getElementById("class").innerHTML = "<option value= ''>--Select--</option><option value= 'ET1I'>ET1I</option><option value= 'ET2I'>ET2I</option><option value= 'ET3I'>ET3I</option><option value= 'ET4I'>ET4I</option><option value= 'ET5I'>ET5I</option><option value= 'ET6I'>ET6I</option>";     
                }
        } 

        function choose2(){
            var sel2 = document.getElementById('class').value;
                if (sel2 == "select"){
                    document.getElementById("subject").innerHTML = "<option value= ''>--Select--</option>";     
                }
                if (sel2 == "CM1I"){
                    document.getElementById("subject").innerHTML = "<option value= ''>--Select--</option><option value='ENG'>ENG</option><option value='BSC'>BSC</option><option value='BMS'>BMS</option><option value='ICT'>ICT</option><option value='EGG'>EGG</option><option value='WPI'>WPI</option>";     
                }
                if (sel2 == "CM2I"){
                    document.getElementById("subject").innerHTML = "<option value= ''>--Select--</option><option>EEC</option><option>AMI</option><option>BEC</option><option>PCI</option><option>BCC</option><option>CPH</option><option>WPD</option>";     
                } 
                if (sel2 == "CM3I"){
                    document.getElementById("subject").innerHTML = "<option value= ''>--Select--</option><option>OOP</option><option>DSU</option><option>CGI</option><option>DMS</option><option>DTE</option>";     
                }
                if (sel2 == "CM4I"){
                    document.getElementById("subject").innerHTML = "<option value= ''>--Select--</option><option>JAVA</option><option>SEN</option><option>DCC</option><option>DCC</option><option>MIC</option><option>GAD</option>";     
                }
                if (sel2 == "CM5I"){
                    document.getElementById("subject").innerHTML = "<option value= ''>--Select--</option><option>EST</option><option>OSY</option><option>AJP</option><option>STE</option><option>CSS</option><option>ITR</option><option>CPP</option>";     
                }
                if (sel2 == "CM6I"){
                    document.getElementById("subject").innerHTML = "<option value= ''>--Select--</option><option>MAD</option><option>ETI</option><option>PWP</option><option>WBP</option><option>CPE</option><option>MAN</option>";     
                }


                if (sel2 == "ME1I"){
                    document.getElementById("subject").innerHTML = "<option value= ''>--Select--</option><option>SUB1</option><option>SUB2</option><option>SUB3</option><option>SUB4</option><option>SUB5</option><option>SUB6</option>";     
                }
                if (sel2 == "ME2I"){
                    document.getElementById("subject").innerHTML = "<option >--Select--</option><option>SUB1</option><option>SUB2</option><option>SUB3</option><option>SUB4</option><option>SUB5</option><option>SUB6</option><option>SUB6</option>";     
                } 
                if (sel2 == "ME3I"){
                    document.getElementById("subject").innerHTML = "<option >--Select--</option><option>SUB1</option><option>SUB2</option><option>SUB3</option><option>SUB4</option><option>SUB5</option>";     
                }
                if (sel2 == "ME4I"){
                    document.getElementById("subject").innerHTML = "<option >--Select--</option><option>SUB1</option><option>SUB2</option><option>SUB3</option><option>SUB4</option><option>SUB5</option><option>SUB6</option>";     
                }
                if (sel2 == "ME5I"){
                    document.getElementById("subject").innerHTML = "<option >--Select--</option><option>SUB1</option><option>SUB2</option><option>SUB3</option><option>SUB4</option><option>SUB5</option><option>SUB6</option>";     
                }
                if (sel2 == "ME6I"){
                    document.getElementById("subject").innerHTML = "<option >--Select--</option><option>SUB1</option><option>SUB2</option><option>SUB3</option><option>SUB4</option><option>SUB5</option>";     
                }
            

                if (sel2 == "IT1I"){
                    document.getElementById("subject").innerHTML = "<option >--Select--</option><option>SUB1</option><option>SUB2</option><option>SUB3</option><option>SUB4</option><option>SUB5</option><option>SUB6</option>";     
                }
                if (sel2 == "IT2I"){
                    document.getElementById("subject").innerHTML = "<option >--Select--</option><option>SUB1</option><option>SUB2</option><option>SUB3</option><option>SUB4</option><option>SUB5</option><option>SUB6</option><option>SUB6</option>";     
                } 
                if (sel2 == "IT3I"){
                    document.getElementById("subject").innerHTML = "<option >--Select--</option><option>SUB1</option><option>SUB2</option><option>SUB3</option><option>SUB4</option><option>SUB5</option>";     
                }
                if (sel2 == "IT4I"){
                    document.getElementById("subject").innerHTML = "<option >--Select--</option><option>SUB1</option><option>SUB2</option><option>SUB3</option><option>SUB4</option><option>SUB5</option><option>SUB6</option>";     
                }
                if (sel2 == "IT5I"){
                    document.getElementById("subject").innerHTML = "<option >--Select--</option><option>SUB1</option><option>SUB2</option><option>SUB3</option><option>SUB4</option><option>SUB5</option><option>SUB6</option>";     
                }
                if (sel2 == "IT6I"){
                    document.getElementById("subject").innerHTML = "<option >--Select--</option><option>SUB1</option><option>SUB2</option><option>SUB3</option><option>SUB4</option><option>SUB5</option>";     
                }
            

                if (sel2 == "CV1I"){
                    document.getElementById("subject").innerHTML = "<option >--Select--</option><option>SUB1</option><option>SUB2</option><option>SUB3</option><option>SUB4</option><option>SUB5</option><option>SUB6</option>";     
                }
                if (sel2 == "CV2I"){
                    document.getElementById("subject").innerHTML = "<option >--Select--</option><option>SUB1</option><option>SUB2</option><option>SUB3</option><option>SUB4</option><option>SUB5</option><option>SUB6</option><option>SUB6</option>";     
                }
                if (sel2 == "CV3I"){
                    document.getElementById("subject").innerHTML = "<option >--Select--</option><option>SUB1</option><option>SUB2</option><option>SUB3</option><option>SUB4</option><option>SUB5</option>";
                }
                if (sel2 == "CV4I"){
                    document.getElementById("subject").innerHTML = "<option >--Select--</option><option>SUB1</option><option>SUB2</option><option>SUB3</option><option>SUB4</option><option>SUB5</option><option>SUB6</option>";     
                }
                if (sel2 == "CV5I"){
                    document.getElementById("subject").innerHTML = "<option >--Select--</option><option>SUB1</option><option>SUB2</option><option>SUB3</option><option>SUB4</option><option>SUB5</option><option>SUB6</option>";     
                }
                if (sel2 == "CV6I"){
                    document.getElementById("subject").innerHTML = "<option >--Select--</option><option>SUB1</option><option>SUB2</option><option>SUB3</option><option>SUB4</option><option>SUB5</option>";     
                }
            
                
                if (sel2 == "AM1I"){
                    document.getElementById("subject").innerHTML = "<option >--Select--</option><option>SUB1</option><option>SUB2</option><option>SUB3</option><option>SUB4</option><option>SUB5</option><option>SUB6</option>";     
                }
                if (sel2 == "AM2I"){
                    document.getElementById("subject").innerHTML = "<option >--Select--</option><option>SUB1</option><option>SUB2</option><option>SUB3</option><option>SUB4</option><option>SUB5</option><option>SUB6</option><option>SUB6</option>";     
                } 
                if (sel2 == "AM3I"){
                    document.getElementById("subject").innerHTML = "<option >--Select--</option><option>SUB1</option><option>SUB2</option><option>SUB3</option><option>SUB4</option><option>SUB5</option>";     
                }
                if (sel2 == "AM4I"){
                    document.getElementById("subject").innerHTML = "<option >--Select--</option><option>SUB1</option><option>SUB2</option><option>SUB3</option><option>SUB4</option><option>SUB5</option><option>SUB6</option>";     
                }
                if (sel2 == "AM5I"){
                    document.getElementById("subject").innerHTML = "<option >--Select--</option><option>SUB1</option><option>SUB2</option><option>SUB3</option><option>SUB4</option><option>SUB5</option><option>SUB6</option>";     
                }
                if (sel2 == "AM6I"){
                    document.getElementById("subject").innerHTML = "<option >--Select--</option><option>SUB1</option><option>SUB2</option><option>SUB3</option><option>SUB4</option><option>SUB5</option>";     
                }

                if (sel2 == "ET1I"){
                    document.getElementById("subject").innerHTML = "<option >--Select--</option><option>SUB1</option><option>SUB2</option><option>SUB3</option><option>SUB4</option><option>SUB5</option><option>SUB6</option>";     
                }
                if (sel2 == "ET2I"){
                    document.getElementById("subject").innerHTML = "<option >--Select--</option><option>SUB1</option><option>SUB2</option><option>SUB3</option><option>SUB4</option><option>SUB5</option><option>SUB6</option><option>SUB6</option>";     
                } 
                if (sel2 == "ET3I"){
                    document.getElementById("subject").innerHTML = "<option >--Select--</option><option>SUB1</option><option>SUB2</option><option>SUB3</option><option>SUB4</option><option>SUB5</option>";     
                }
                if (sel2 == "ET4I"){
                    document.getElementById("subject").innerHTML = "<option >--Select--</option><option>SUB1</option><option>SUB2</option><option>SUB3</option><option>SUB4</option><option>SUB5</option><option>SUB6</option>";     
                }
                if (sel2 == "ET5I"){
                    document.getElementById("subject").innerHTML = "<option >--Select--</option><option>SUB1</option><option>SUB2</option><option>SUB3</option><option>SUB4</option><option>SUB5</option><option>SUB6</option>";     
                }
                if (sel2 == "ET6I"){
                    document.getElementById("subject").innerHTML = "<option >--Select--</option><option>SUB1</option><option>SUB2</option><option>SUB3</option><option>SUB4</option><option>SUB5</option>";     
                }
        }

     </script>
</body>
</html>