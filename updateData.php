<?php
include_once 'dbconnectioin.php';

if(isset($_GET['update'])) {
    $student_id = $_GET['update'];
//    $student_data = mysqli_query($conn, "select* from student where student_id=$student_id");
//    $row = mysqli_fetch_array($student_data);
    //Using PDO Method...
    $stm= $pdoConn->query("select* from student where student_id=$student_id");
    $row=$stm->fetch(PDO::FETCH_ASSOC);

}
//update data in db..
if(isset($_POST['edit'])) {
    $student_id   = $_POST['std_id'];
    $student_name = $_POST['std_name'];
    $student_roll = $_POST['std_roll'];
    $student_year = $_POST['std_year'];
    $student_pass = $_POST['std_pass'];

    //$query="update student set name='$student_name', pass='$student_pass',roll_no='$student_roll',year='$student_year' where student_id=$student_id;";
    try {
        $pdoConn->beginTransaction();
        $stm = $pdoConn->exec("update student set name='$student_name', pass='$student_pass',roll_no='$student_roll',year='$student_year' where student_id=$student_id;");
        $pdoConn->commit();
        echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully Upadate Data!...');
    window.location.href='adminPage.php';
    </script>");

    }
    catch (Exception $e) {
        $pdoConn->rollBack();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Student Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="add_std" >
    <span>Update Student Data</span>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-group">
            <label for="std_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
            <input type="text" name="std_name" id="std_name" placeholder="Student Name" value="<?php echo $row['name']; ?>" />
            <input type="hidden" name="std_id" id="std_id" value="<?php echo $row['student_id']; ?>" />
        </div>
        <div class="form-group">
            <label for="std_roll"><i class="zmdi zmdi-pin-account"></i></label>
            <input type="text" name="std_roll" id="std_roll" placeholder="Roll Number" value="<?php echo $row['roll_no']; ?>"/>
        </div>
        <div class="form-group">
            <label for="std_year"><i class="zmdi zmdi-library"></i></label>
            <input type="text" name="std_year" id="std_year" placeholder="Year" value="<?php echo $row['year']; ?>"/>
        </div>
        <div class="form-group">
            <label for="std_pass"><i class="zmdi zmdi-lock"></i></label>
            <input type="password" name="std_pass" id="std_pass" placeholder="Password" value="<?php echo $row['pass']; ?>"/>
        </div>
        <input type="submit" name="edit" id="edit" class="form-submit" value="Update" />
    </form>
</div>
<style>

    .form-submit{
    margin-left: 30px;
    }
    .add_std{
    width: 20%;
    margin-left: 15%;
        margin-top: 5%;
    }
    .add_std span {
    font-size: 30px;
    }
    .add_std form {
    margin-top: 30px;
    }
</style>