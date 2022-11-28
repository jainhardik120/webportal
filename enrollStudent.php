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
    <title>Enroll Student</title>
</head>

<body>
    <div class="jumbotron text-center" style="margin-bottom:0">
        <h1>Jaypee Institute Of Information Technology</h1>
    </div>
    <?php
    include('connection.php');
    $sql = "SELECT cid, name from course";
    $res = mysqli_query($con, $sql);
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-4">

            </div>
            <div class="col-md-4" style="margin-top:20px;">
                <div class="card">
                    <div class="card-header">Enroll Student in Subject</div>
                    <div class="card-body">
                        <form name="f1" action="enrollStudent.php" onsubmit="return validation()" method="POST">
                            <div class="form-group">
                                <label>Enter Enrollment Number</label>
                                <input type="text" id="user" name="user" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Select Course : </label>
                                <select name="cid">
                                    <?php
                                    while ($course = mysqli_fetch_array(
                                        $res,
                                        MYSQLI_ASSOC
                                    )) :;
                                    ?>
                                        <option value="<?php echo $course["cid"];
                                                        ?>">
                                            <?php echo $course["name"];
                                            ?>
                                        </option>
                                    <?php
                                    endwhile;
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit1" id="btn" class="btn btn-info" value="Enroll" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
            </div>
        </div>
    </div>
    <script>
        function validation() {
            var id = document.f1.user.value;
            if (id.length == "") {
                alert("Enrollment Number is empty");
                return false;
            }
        }
    </script>
    <?php
    if (isset($_POST["submit1"])) {
        $username = $_POST['user'];
        $course = $_POST['cid'];
        $sql = "Insert into enroll values ('$username', '$course')";
        mysqli_query($con, $sql);
        header('Location: adminHome.php');
    }

    ?>
</body>

</html>