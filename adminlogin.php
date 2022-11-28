<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="jiitlogo_2.png">
    <link rel="stylesheet" href="./style.css">
    <title>Admin Portal</title>
</head>

<body>
    <div class="jumbotron text-center" style="margin-bottom:0">
        <h1>Jaypee Institute Of Information Technology</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">

            </div>
            <div class="col-md-4" style="margin-top:20px;">
                <div class="card">
                    <div class="card-header">Admin Login</div>
                    <div class="card-body">
                        <form name="f1" action="adminlogin.php" onsubmit="return validation()" method="POST">
                            <div class="form-group">
                                <label>Enter Username</label>
                                <input type="text" id="user" name="user" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Enter Password</label>
                                <input type="password" id="pass" name="pass" class="form-control" />
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit1" id="btn" class="btn btn-info" value="Login" />
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
            if (id.length == "" && ps.length == "") {
                alert("Username and Password fields are empty");
                return false;
            } else {
                if (id.length == "") {
                    alert("Username is empty");
                    return false;
                }
                if (ps.length == "") {
                    alert("Password field is empty");
                    return false;
                }
            }
        }
    </script>
    <?php
    if (isset($_POST["submit1"])) {
        include('connection.php');
        $username = $_POST['user'];
        $password = $_POST['pass'];
        $username = stripcslashes($username);
        $password = stripcslashes($password);
        $username = mysqli_real_escape_string($con, $username);
        $password = mysqli_real_escape_string($con, $password);
        $sql = "select *from admin where username = '$username' and code = '$password'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        if ($count == 1) {
            echo "<h1><center> Login successful </center></h1>";
            $_SESSION["uname"] = $_POST['user'];
            header('Location: adminHome.php');
        } else {
            echo '<script>alert("Invalid username or password")</script>';
        }
    }

    ?>
</body>

</html>