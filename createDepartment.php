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
    <title>Create Department</title>
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
                    <div class="card-header">Create Department</div>
                    <div class="card-body">
                        <form name="f1" action="createDepartment.php" onsubmit="return validation()" method="POST">
                            <div class="form-group">
                                <label>Enter Department Name</label>
                                <input type="text" id="name" name="name" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Enter Department Id</label>
                                <input type="number" id="did" name="did" class="form-control" />
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
            var dept = document.f1.did.value;
            if (name.length == "") {
                alert("Department Name is empty");
                return false;
            }
            if (dept.length == "") {
                alert("Department id is empty");
                return false;
            }
        }
    </script>
    <?php
    if (isset($_POST["submit1"])) {
        $deptname = $_POST['name'];
        $did = $_POST['did'];
        $sql = "Insert into department values ('$did', '$deptname')";
        mysqli_query($con, $sql);
        header('Location: adminHome.php');
    }

    ?>
</body>

</html>