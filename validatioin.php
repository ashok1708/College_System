<?php
session_start();
include_once 'dbconnectioin.php';

//if(mysqli_connect_errno()) {
//    die("Failed to connect with MySQL: ". mysqli_connect_error());
//}

if (isset($_POST['signin'])) {
    $user_roll = $_POST['user_roll'];
    $user_pass = $_POST['user_pass'];

//    $res = mysqli_query($conn, "select* from student where roll_no='$user_roll'and pass='$user_pass'");
//    $result = mysqli_fetch_array($res, MYSQLI_ASSOC);
//    if ($result) {
//
//        $_SESSION['user_data'] = $result;
//        header("location:home.php");
//    } else {
//        echo "failed ";
//    }

    //using pdo method..
    $res=$pdoConn->query("select* from student where roll_no='$user_roll'and pass='$user_pass'");
    $result=$res->fetch(PDO::FETCH_ASSOC);

    if($result){
        $_SESSION['student_data'] = $result;
        header("location:home.php");
    } else {
        echo "failed ";
    }


}

if(isset($_POST['admin_login'])){
    $admin_id=$_POST['admin_id'];
    $admin_pass=$_POST['admin_pass'];

//    $res=mysqli_query($conn,"select* from admin where user_id='$admin_id' and pas='$admin_pass'");
//    $result= mysqli_fetch_array($res, MYSQLI_ASSOC);

    //using pdo method..
    $stm=$pdoConn->query("select* from admin where user_id='$admin_id' and pas='$admin_pass'");
    $result=$stm->fetch(PDO::FETCH_ASSOC);
    if($result){
        header("location:adminPage.php");
    }
    else{
        echo "failed";
    }
}
?>

