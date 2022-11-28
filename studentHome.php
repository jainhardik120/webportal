<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="./style.css">
    <link rel="icon" type="image/x-icon" href="jiitlogo_2.png">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal</title>
</head>

<body>
    <div class="jumbotron text-center" style="margin-bottom:0">
        <h1>Jaypee Institute Of Information Technology</h1>
    </div>
    <div class="center">
        <input type="button" class="button-home horizontal-center" onclick="location.href='subjectTeachers.php';" value="View Subject Teachers" /> </br></br></br>
        <input type="button" class="button-home horizontal-center" onclick="location.href='studentAttendance.php';" value="View Attendance" /></br></br></br>
        <input type="button" class="button-home horizontal-center" onclick="location.href='studentMarks.php';" value="View Marks" /></br></br></br>
    </div>
</body>

</html>