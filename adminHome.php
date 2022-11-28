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
    <title>Admin Portal</title>
</head>

<body>
    <div class="jumbotron text-center" style="margin-bottom:0">
        <h1>Jaypee Institute Of Information Technology</h1>
    </div>
    <div class="center">
        <input type="button" class="button-home horizontal-center" onclick="location.href='createTeacher.php';" value="Create Teacher" /> </br></br></br>
        <input type="button" class="button-home horizontal-center" onclick="location.href='createStudent.php';" value="Create Student" /></br></br></br>
        <input type="button" class="button-home horizontal-center" onclick="location.href='createDepartment.php';" value="Create Department" /></br></br></br>
        <input type="button" class="button-home horizontal-center" onclick="location.href='createCourse.php';" value="Create Course" /></br></br></br>
        <input type="button" class="button-home horizontal-center" onclick="location.href='enrollStudent.php';" value="Enroll Student" /></br></br></br>
        <input type="button" class="button-home horizontal-center" onclick="location.href='registerFaculty.php';" value="Register Faculty" /></br></br></br>
    </div>
</body>

</html>