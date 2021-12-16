<?php
include_once "dbconnectioin.php";

$student_id = $_GET["student_id"];
$sem = $_GET["sem"];

$stm = $pdoConn->query("select* from result where student_id=$student_id and sem=$sem");
$res = $stm->fetch(PDO::FETCH_ASSOC);

if($res) {
    $result = $res['oops'] + $res['dbms'] + $res['dsa'];
    $percent = ($result / 300) * 100;
    $status;
    if ($percent >= 45) {
        $status = "Pass";
    } else {
        $status = "Fail";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Result</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="css/style.css">

    <style>
        .header {
            margin-top: 70px;
        }

        .table {
            margin: auto;
            width: 70%;

        }
        #signin{
            margin-top: 36px;
            color: #fff;
            margin-left: 47%;
        }

    </style>
</head>
<body>

<div class="header">
    <span style="font-size: 30px; margin-left: 40%"><?php echo $sem ?><sup>st</sup> Semester Result</span>
    <div class="content"
</div>
<?php if ($res) { ?>
    <table class="table">
        <thead class="thead-light">
        <tr>
            <th scope="col">Subject Code</th>
            <th scope="col">Subject</th>
            <th scope="col">Marks</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1001</th>
            <td>Object Oriented Programming</td>
            <td><?php echo $res['oops']; ?></td>

        </tr>
        <tr>
            <th scope="row">1014</th>
            <td>Data Structure & Algorithms</td>
            <td><?php echo $res['dsa']; ?></td>
        </tr>
        <tr>
            <th scope="row">1021</th>
            <td>DBMS</td>
            <td><?php echo $res['dbms']; ?></td>
        </tr>
        </tbody>
        <thead class="thead-light">
        <tr>
            <th scope="col">Result</th>
            <th scope="col"></th>
            <th scope="col"><?php echo $status ?></th>

        </tr>
        </thead>
    </table>

    <div class="form-group form-button">
        <a href="home.php" type="submit" name="signin" id="signin" class="form-submit" value="Log in">Back</a>
    </div>
<?php } else { ?>
    <span style="font-size: 24px; margin-left: 42%">Result Awaited...</span>
<?php } ?>
 </div>
</body>
</html>

