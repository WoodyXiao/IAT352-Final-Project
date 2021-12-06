<!--------------------------------- login page part -------------------------------->
<?php
include('../private/initialize.php');
include("../private/database/db.php");
include "../private/helpers/validate.php";
include('../private/controller/user.php');

?>




<!-- html part  -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Public Art - login</title>

    <!-- for bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- Custom Styling -->
    <style>
        <?php include(PUBLIC_PATH . '/Assets/css/login.css');
        ?><?php include(PUBLIC_PATH . '/Assets/css/css.css');
            ?><?php //include('public/Assets/css/login.css'); 
                ?><?php //include('public/Assets/css/css.css'); 
                    ?>
    </style>
</head>

<body>

    <!-- header part -->
    <?php include(INCLUDE_PATH . '/header.php');
    ?>
    <?php //include('private/includes/header.php'); 
    ?>
    <!-- end header part -->

    <!-- display the error in the register form  -->
    <?php include "../private/helpers/formErrors.php" ?>
    <!-- end display the error in the register form  -->

    <!-- for the login body part -->
    <form action="login.php" method="post">
        <div class="body-box">

            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="logo">
                <h1>MEMBER LOGIN</h1>
            </div>

            <div class="register-container">
                <!-- Login Form -->
                <div class="form-container">
                    <div class="detail-box">
                        <h5>Username</h5>
                        <input type="text" id="login" class="" name="username" placeholder="username" value="<?php echo $username ?>">
                    </div>
                    <div class="detail-box">
                        <h5>Password</h5>
                        <input type="text" id="password" class="" name="password" placeholder="password" value="<?php echo $password ?>">
                    </div>

                    <button type="submit" class="login-btn" name="login-btn">Login</button>
                    <div id="formFooter">
                        <a class="" href="register.php">Not a member yet? Create an account now ></a>
                    </div>
                </div>
            </div>

        </div>
    </form>
    <!-- end for the login body part -->



</body>

</html>