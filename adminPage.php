<?php
include_once 'dbconnectioin.php';

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

<div class="header">
    <span style="font-size: 30px; margin-left: 25%">Student Details</span>
    <a  id="add_student" href="addStudent.php" class="form-submit">Add Student</a>
    <div class="content">
        <?php
//        $res = mysqli_query($conn, "select* from student");
//             using pdo method...
        $stm= $pdoConn->query("select* from student");
        $res=$stm->fetchAll(PDO::FETCH_NUM);
        ?>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Roll Number</th>
                <th scope="col">Year</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($res as $row) {
                ?>
                <tr>

                    <th scope="row" > <?php echo $row[0]; ?> </th>
                    <td> <?php echo $row[1]; ?> </td>
                    <td> <?php echo $row[3]; ?> </td>
                    <td> <?php echo $row[4]; ?> </td>
                    <td> <a href="adminPage.php?del=<?php echo $row[0];?>" type="submit"  id="del_student" class="form-submit" value="Delete                          Data">Delete Data</a>
                        <a href="updateData.php?update=<?php echo $row[0];?>" type="submit"  id="del_student" class="form-submit"                                       value="Edit Data">Edit Data</a>
                    </td>

                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>

    </div>

</div>
<?php
if (isset($_GET['del'])){
    $student_id=$_GET['del'];
//    $query=mysqli_query($conn,"delete from student where student_id=$student_id")

try {
    $pdoConn->beginTransaction();
    $stm = $pdoConn->exec("delete from student where student_id=$student_id");
    $pdoConn->commit();
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully Deleted');
    window.location.href='adminPage.php';
    </script>");

}
catch (Exception $e) {
    $pdoConn->rollBack();
}
}
?>
</body>
</html>

<style>
    .form-submit{
        margin-left: 30px;
    }
    .add_std{
        width: 20%;
        margin-left: 15%;
        margin-top: 5%;
    }
    #del_student{
        margin: 0;
        padding: 10px 25px;
        text-decoration: none;
    }
    .table.table {
        margin-top: 50px;
    }
    #add_student{
        float: right;
        margin-right: 20px;
        margin-bottom: 20px;
        color: #ffffff;
    }
</style>
