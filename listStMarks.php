<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./style.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="jiitlogo_2.png">

    <title>Employee Portal</title>
</head>

<body>
    <div class="jumbotron text-center" style="margin-bottom:0">
        <h1>Jaypee Institute Of Information Technology</h1>
    </div>
    <br />
    <form method="post">
        <div class="horizontal-center" style="padding:20px;">
            Exam event : <input type="text" id="event" name="event"></br>
            Total marks : <input type="number" id="total_marks" name="total">
        </div>
        <br />
        <br />
        <br />
        <div class="table-wrapper">
            <table class="fl-table">
                <thead>
                    <tr>
                        <th>Enrollment Number</th>
                        <th>Student Name</th>
                        <th>Marks</th>
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
                        print('<input type="number" id="' . $row['eno'] . '" name="' . $row['eno'] . '" value="' . '0' . '">');
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>

            </table>
        </div>
        <input type="submit" name="submit" class="btn btn-info horizontal-center" value="Submit" />
    </form>
    <?php
    if (isset($_POST['submit'])) {
        $sql = "SELECT s.name as name, s.eno as eno from student s, enroll e, register r where s.eno = e.eno and e.cid = r.cid and r.eid = '$eid' and r.cid = '$cid' and r.batch = '$batch' and s.batch = r.batch";
        $res = mysqli_query($con, $sql);
        $event = $_POST["event"];
        $total = $_POST["total"];
        while ($row = mysqli_fetch_array($res)) {
            $eno_temp = $row['eno'];
            $marksObtained = $_POST[$eno_temp];
            $insert_query = "Insert into marks values ($eno_temp, $cid, '$event', $marksObtained, $total)";
            mysqli_query($con, $insert_query);
        }
        header('Location: employeeHome.php');
    }
    ?>
</body>

</html>