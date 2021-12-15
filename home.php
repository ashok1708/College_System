<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RTU Student Login</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
        session_start();
        $user_data = $_SESSION['user_data'];
        var_dump($user_data);
     ?>

    <div class="main">

        <section class="sign-in">
            <div class="container">


                <h2 class="form-title"> <?php echo $user_data['name'] ?></h2> <br>
                <h2 class="form-title">Roll Number : <?php echo $user_data['roll_no'] ?></h2>
                <h2 class="form-title">Year : <?php echo $user_data['year'] ?></h2>
            </div>
        </section>

    </div>

<!-- JS -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>