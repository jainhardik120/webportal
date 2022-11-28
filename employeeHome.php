<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="jiitlogo_2.png">
    <link rel="stylesheet" href="./style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Portal</title>
</head>

<body>
    <div class="jumbotron text-center" style="margin-bottom:0">
        <h1>Jaypee Institute Of Information Technology</h1>
    </div>
    <div class="center">
        <input type="button" class="button-home horizontal-center" onclick="location.href='giveAttendance.php';" value="Mark Attendance" /> </br></br></br>
        <input type="button" class="button-home horizontal-center" onclick="location.href='giveMarks.php';" value="Upload Marks" /></br></br></br>
    </div>
</body>

</html>