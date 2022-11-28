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
    <?php
    include('connection.php');
    $eid = $_SESSION['eid'];
    $sql = "SELECT DISTINCT batch from register where eid = '$eid'";
    $res = mysqli_query($con, $sql);
    ?>
    <?php
    $showDivFlag = true;
    if (isset($_POST['submit1'])) {
        $showDivFlag = false;
        $batchSelected = $_POST['Batch'];
        $_SESSION["Batch"] = $_POST['Batch'];
        $sql = "SELECT DISTINCT r.cid as cid, c.name as cname from register r, course c where r.eid = '$eid' and r.batch = '$batchSelected' and r.cid = c.cid";
        $res2 = mysqli_query($con, $sql);
    }
    ?>
    <?php
    $showDivFlag2 = true;
    if (isset($_POST['submit2'])) {
        $showDivFlag2 = false;
        $_SESSION["Cid"] = $_POST['Course'];
        header('Location: listStMarks.php');
    }
    ?>
    <br />
    <br />
    <div id="selectBatch" class="horizontal-center" <?php if ($showDivFlag === false) { ?>style="display:none" <?php } ?><?php if ($showDivFlag2 === false) { ?>style="display:none" <?php } ?>>
        <form method="post">
            Batch : <select name="Batch">
                <?php
                while ($batch = mysqli_fetch_array(
                    $res,
                    MYSQLI_ASSOC
                )) :;
                ?>
                    <option value="<?php echo $batch["batch"];
                                    ?>">
                        <?php echo $batch["batch"];
                        ?>
                    </option>
                <?php
                endwhile;
                ?>
            </select>
            <input type="submit" name="submit1" value="Next" />
        </form>
    </div>
    <div id="selectCourse" class="horizontal-center" <?php if ($showDivFlag === true) { ?>style="display:none" <?php } ?><?php if ($showDivFlag2 === false) { ?>style="display:none" <?php } ?>>
        <form method="post">
            Subject : <select name="Course">
                <?php
                while ($course2 = mysqli_fetch_array(
                    $res2,
                    MYSQLI_ASSOC
                )) :;
                ?>
                    <option value="<?php echo $course2["cid"];
                                    ?>">
                        <?php echo $course2["cname"];
                        ?>
                    </option>
                <?php
                endwhile;
                ?>
            </select>
            <input type="submit" name="submit2" value="Next" />
        </form>
    </div>
</body>

</html>