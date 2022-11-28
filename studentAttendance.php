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

    <title>Attendance</title>
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
                    <th>Attendance</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('connection.php');
                $eno = $_SESSION['eno'];
                $query = "SELECT 100*round(avg(a.attend), 1) as perc, c.name as cname from attendance a, course c where a.eno = $eno and a.cid = c.cid group by a.cid;";
                $res = mysqli_query($con, $query);
                while ($row = mysqli_fetch_array($res)) {
                    print("<tr><td>");
                    print($row["cname"]);
                    print("</td><td>");
                    print($row["perc"]);
                    print("</td></tr>");
                }
                ?>
            <tbody>
        </table>
    </div>
</body>

</html>