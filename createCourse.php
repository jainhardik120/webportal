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
    <title>Create Course</title>
</head>

<body>
    <div class="jumbotron text-center" style="margin-bottom:0">
        <h1>Jaypee Institute Of Information Technology</h1>
    </div>
    <?php
    include('connection.php');
    $sql = "SELECT did, name from department";
    $res = mysqli_query($con, $sql);
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-4">

            </div>
            <div class="col-md-4" style="margin-top:20px;">
                <div class="card">
                    <div class="card-header">Create Course</div>
                    <div class="card-body">
                        <form name="f1" action="createcourse.php" onsubmit="return validation()" method="POST">
                            <div class="form-group">
                                <label>Enter Course Name</label>
                                <input type="text" id="name" name="name" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Enter Course Id</label>
                                <input type="number" id="cid" name="cid" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Select Department : </label>
                                <select name="dept">
                                    <?php
                                    while ($department = mysqli_fetch_array(
                                        $res,
                                        MYSQLI_ASSOC
                                    )) :;
                                    ?>
                                        <option value="<?php echo $department["did"];
                                                        ?>">
                                            <?php echo $department["name"];
                                            ?>
                                        </option>
                                    <?php
                                    endwhile;
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit1" id="btn" class="btn btn-info" value="Create" />
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
            var name = document.f1.name.value;
            var cid = document.f1.cid.value;
            var dept = document.f1.dept.value;
            if (name.length == "") {
                alert("Course Name is empty");
                return false;
            }
            if (cid.length == "") {
                alert("Course id is empty");
                return false;
            }
            if (dept.length == "") {
                alert("Department not selected");
                return false;
            }
        }
    </script>
    <?php
    if (isset($_POST["submit1"])) {
        $coursename = $_POST['name'];
        $did = $_POST['dept'];
        $cid = $_POST['cid'];
        $sql = "Insert into course values ('$cid', '$coursename', '$did')";
        mysqli_query($con, $sql);
        header('Location: adminHome.php');
    }

    ?>
</body>

</html>