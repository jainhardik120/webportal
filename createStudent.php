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
    <title>Create Student</title>
</head>

<body>
    <div class="jumbotron text-center" style="margin-bottom:0">
        <h1>Jaypee Institute Of Information Technology</h1>
    </div>
    <?php
    include('connection.php');
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-4">

            </div>
            <div class="col-md-4" style="margin-top:20px;">
                <div class="card">
                    <div class="card-header">Create Student</div>
                    <div class="card-body">
                        <form name="f1" action="createStudent.php" onsubmit="return validation()" method="POST">
                            <div class="form-group">
                                <label>Enter Student Name</label>
                                <input type="text" id="name" name="name" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Enter Enrollment Number</label>
                                <input type="text" id="user" name="user" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Enter Password</label>
                                <input type="password" id="pass" name="pass" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Enter Batch</label>
                                <input type="text" id="batch" name="batch" class="form-control" />
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
            var batch = document.f1.batch.value;
            if (id.length == "") {
                alert("Enrollment Number is empty");
                return false;
            }
            if (ps.length == "") {
                alert("Password field is empty");
                return false;
            }
            if (name.length == "") {
                alert("Student Name is empty");
                return false;
            }
            if (batch.length == "") {
                alert("Batch empty");
                return false;
            }
        }
    </script>
    <?php
    if (isset($_POST["submit1"])) {
        $username = $_POST['user'];
        $password = $_POST['pass'];
        $teachername = $_POST['name'];
        $batch = $_POST['batch'];
        $sql = "Insert into student values ('$username', '$teachername','$batch', '$password')";
        mysqli_query($con, $sql);
        header('Location: adminHome.php');
    }

    ?>
</body>

</html>