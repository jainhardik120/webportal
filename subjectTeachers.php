<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="icon" type="image/x-icon" href="jiitlogo_2.png">

    <title>Student Portal</title>
</head>

<body>
    <div class="jumbotron text-center" style="margin-bottom:0">
        <h1>Jaypee Institute Of Information Technology</h1>
    </div>
    <div class="table-wrapper">
        <table class="fl-table">
            <thead>
                <tr>
                    <th>Course Name</th>
                    <th>Teacher</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('connection.php');
                $eno = $_SESSION['eno'];
                $query = "select t.name as teacher, c.name as course from student s, teacher t, course c, register r where s.batch = r.batch and r.eid = t.eid and c.cid = r.cid and s.eno = '$eno'";
                $res = mysqli_query($con, $query);
                while ($row = mysqli_fetch_array($res)) {
                    print("<tr><td>");
                    print($row["course"]);
                    print("</td><td>");
                    print($row["teacher"]);
                    print("</td></tr>");
                }
                ?>
            <tbody>
        </table>
    </div>
</body>

</html>