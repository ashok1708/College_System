<?php
include_once 'dbconnectioin.php';

if(isset($_POST['add'])){
    $student_name=$_POST['std_name'];
    $student_roll=$_POST['std_roll'];
    $student_year=$_POST['std_year'];
    $student_pass=$_POST['std_pass'];

    $query =  "INSERT INTO student (name, pass, roll_no, year) VALUES ('$student_name','$student_pass','$student_roll','$student_year')";

    if(mysqli_query($conn,$query)){
        header("location:adminPage.php?success=1");
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="add_std" >
    <span>Add New Student</span>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-group">
            <label for="std_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
            <input type="text" name="std_name" id="std_name" placeholder="Student Name" />
        </div>
        <div class="form-group">
            <label for="std_roll"><i class="zmdi zmdi-pin-account"></i></label>
            <input type="text" name="std_roll" id="std_roll" placeholder="Roll Number"/>
        </div>
        <div class="form-group">
            <label for="std_year"><i class="zmdi zmdi-library"></i></label>
            <input type="text" name="std_year" id="std_year" placeholder="Year"/>
        </div>
        <div class="form-group">
            <label for="std_pass"><i class="zmdi zmdi-lock"></i></label>
            <input type="password" name="std_pass" id="std_pass" placeholder="Password"/>
        </div>
        <input type="submit" name="add" id="add" class="form-submit" value="Add"/>
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