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
    <title>Student Marks</title>
</head>

<body>
    <div class="jumbotron text-center" style="margin-bottom:0">
        <h1>Jaypee Institute Of Information Technology</h1>
    </div>
    <?php
    include('connection.php');
    $eno = $_SESSION['eno'];
    $sql = "SELECT DISTINCT exam_event as exam from marks where eno = '$eno'";
    $res = mysqli_query($con, $sql);
    ?>
    <br />
    <br />
    <div class="horizontal-center">
        <form method="post">
            <select name="Exam">
                <?php
                while ($category = mysqli_fetch_array(
                    $res,
                    MYSQLI_ASSOC
                )) :;
                ?>
                    <option value="<?php echo $category["exam"];
                                    ?>">
                        <?php echo $category["exam"];
                        ?>
                    </option>
                <?php
                endwhile;
                ?>
            </select>
            <input type="submit" name="submit" value="View Marks" />
        </form>
    </div>
    <br />
    <br />
    <div class="table-wrapper">
        <table class="fl-table">
            <thead>
                <tr>
                    <th>Course Name</th>
                    <th>Marks</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_POST['submit'])) {
                    $selected_val = $_POST['Exam'];
                    $sql = "SELECT c.name as cname, m.marks_obtained as mo, m.total_marks as tm from course c, marks m where m.eno = $eno and c.cid = m.cid and m.exam_event = '$selected_val'";
                    $res = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_array($res)) {
                        print("<tr><td>");
                        print($row["cname"]);
                        print("</td><td>");
                        print($row["mo"] . "/" . $row["tm"]);
                        print("</td></tr>");
                    }
                }
                ?>
            <tbody>
        </table>
    </div>
</body>

</html>