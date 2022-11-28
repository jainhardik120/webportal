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
    <title>Create Teacher</title>
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
                    <div class="card-header">Create Teacher</div>
                    <div class="card-body">
                        <form name="f1" action="createTeacher.php" onsubmit="return validation()" method="POST">
                            <div class="form-group">
                                <label>Enter Teacher Name</label>
                                <input type="text" id="name" name="name" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Enter Teacher Id</label>
                                <input type="text" id="user" name="user" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Enter Password</label>
                                <input type="password" id="pass" name="pass" class="form-control" />
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
            var id = document.f1.user.value;
            var ps = document.f1.pass.value;
            var name = document.f1.name.value;
            var dept = document.f1.dept.value;
            if (id.length == "") {
                alert("Employee ID is empty");
                return false;
            }
            if (ps.length == "") {
                alert("Password field is empty");
                return false;
            }
            if (name.length == "") {
                alert("Teacher Name is empty");
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
        $username = $_POST['user'];
        $password = $_POST['pass'];
        $teachername = $_POST['name'];
        $dept = $_POST['dept'];
        $sql = "Insert into teacher values ('$username', '$teachername',$dept, '$password')";
        mysqli_query($con, $sql);
        header('Location: adminHome.php');
    }

    ?>
</body>

</html>