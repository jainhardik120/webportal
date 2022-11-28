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
    <title>Employee Portal</title>
</head>

<body>
    <div class="jumbotron text-center" style="margin-bottom:0">
        <h1>Jaypee Institute Of Information Technology</h1>
    </div>
    <br />
    <form method="post">
        <div class="table-wrapper">
            <table class="fl-table">
                <thead>
                    <tr>
                        <th>Enrollment Number</th>
                        <th>Student Name</th>
                        <th>Attendance</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include('connection.php');
                    $batch = $_SESSION["Batch"];
                    $cid = $_SESSION["Cid"];
                    $eid = $_SESSION["eid"];
                    $sql = "SELECT s.name as name, s.eno as eno from student s, enroll e, register r where s.eno = e.eno and e.cid = r.cid and r.eid = '$eid' and r.cid = '$cid' and r.batch = '$batch' and s.batch = r.batch";
                    $res = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_array($res)) {
                        echo "<tr>";
                        echo "<td>" . $row['eno'] . "</td>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>";
                        print('<input type="checkbox" id="' . $row['eno'] . '" name="' . $row['eno'] . '" value="' . $row['eno'] . '">');
                        print('<label for="' . $row['eno'] . '">' . "Present" . '</label><br>');
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>

            </table>
        </div>
        <div class="horizontal-center">
            <input type="date" id="date" name="date">
            <input type="submit" name="submit" value="Submit" />
        </div>

    </form>
    <?php
    if (isset($_POST['submit'])) {
        $sql = "SELECT s.name as name, s.eno as eno from student s, enroll e, register r where s.eno = e.eno and e.cid = r.cid and r.eid = '$eid' and r.cid = '$cid' and r.batch = '$batch' and s.batch = r.batch";
        $res = mysqli_query($con, $sql);
        $date = $_POST["date"];
        while ($row = mysqli_fetch_array($res)) {
            $eno_temp = $row['eno'];
            $attend = 0;
            if (isset($_POST[$eno_temp])) {
                $attend = 1;
            }
            $insert_query = "Insert into attendance values ($cid,  $eno_temp,'$date', $attend)";
            mysqli_query($con, $insert_query);
        }
        header('Location: employeeHome.php');
    }
    ?>
</body>

</html>