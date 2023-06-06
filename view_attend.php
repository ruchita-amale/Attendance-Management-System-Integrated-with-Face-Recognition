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
            <br>
            <form>
                <div class="row">
                    <div class="col-md-4 .mx-auto text-center" style="padding: 12px">
                       
                    </div>
                     <div class="col-md-4 .mx-auto text-center" style="padding: 12px">
                        <label for="class">Select Date</label>
                        <input type="date" name="">
                    </div>
                </div>
            </form>
        </div>
        <br>
        <div id="#">
            <div>
                    
            </div>
            <h5><u><b><i>3 October 2020</i></b></u></h5><br>
            <button type="button" class="btn btn-success btn-sm" style="margin: 4px;" onclick="parent.location='profile.php'">17_Ruchita_Amale</button>
            <button type="button" class="btn btn-success btn-sm" style="margin: 4px;">16_Patil_Prajyoti</button>
            <button type="button" class="btn btn-danger btn-sm" style="margin: 4px;">08_Suryawanshi_Manasvi</button>
        </div>
    </div>
    <br>

    <br>
    <div style="color: #fff">
    <?php 
    require 'include/footer.php';
     ?>
     </div>
</body>
</html>