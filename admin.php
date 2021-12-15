<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="main">
    <section class="sign-in">
        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="images/admin.png" alt="sing up image"></figure>
                </div>

                <div class="signin-form">
                    <h2 class="form-title">Admin Pannel</h2>

                    <form method="POST" class="register-form" id="admin-login" action="validatioin.php">
                        <div class="form-group">
                            <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="admin_id" id="admin_id" placeholder="User Id" />
                        </div>
                        <div class="form-group">
                            <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="admin_pass" id="admin_pass" placeholder="Password"/>
                        </div>

                        <div class="form-group form-button">
                            <input type="submit" name="admin_login" id="admin_login" class="form-submit" value="Log in"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</div>

<!-- JS -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>