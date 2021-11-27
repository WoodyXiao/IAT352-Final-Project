<!--------------------------------- edit account profile page part -------------------------------->
<?php include('../../private/initialize.php');
include("../../private/database/db.php");
include('../../private/controller/user.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Public Art - Edit profile</title>

    <!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
    <script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css">
    <script src="http://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <!--    <script src="https://raw.githubusercontent.com/furf/jquery-ui-touch-punch/master/jquery.ui.touch-punch.js"></script>-->

    <!-- for bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- Custom Styling -->
    <style>
        <?php include(PUBLIC_PATH . '/Assets/css/css.css'); ?><?php include(PUBLIC_PATH . '/Assets/css/edit.css'); ?>
    </style>
</head>

<body>
    <!-- header part -->
    <?php include(INCLUDE_PATH . '/header.php'); ?>
    <!-- end header part -->

    <!-- flash message when log in successfully -->
    <?php include(INCLUDE_PATH . '/message.php'); ?>
    <!-- end flash message when log in successfully -->

    <div class="main-containers">
        <h1>EDIT PROFILE</h1>
        <h5>Edit account information</h5>
        <div class="main-box">
            <div class="left-side">
                <div class="detail-box">
                    <h5>Name*</h5>
                    <input type="text">
                </div>
                <div class="detail-box">
                    <h5>Email*</h5>
                    <input type="email">
                </div>
                <div class="detail-box">
                    <h5>Phone Number*</h5>
                    <input type="number">
                </div>
                <div class="detail-box">
                    <h5>Username* (must be under 30 characters)</h5>
                    <input type="text">
                </div>
                <div class="detail-box">
                    <h5>Password* (must be under 30 characters)*</h5>
                    <input type="password">
                </div>
                <div class="detail-box">
                    <h5>Confirmed Password* (must be under 30 characters)*</h5>
                    <input type="password">
                </div>
                <button class="saveBtn">Save Changes</button>
            </div>
            <div class="right-side">
                <div class="detail-box">
                    <h5>Upload A Profile Photo</h5>
                    <input type="file" id="file">
                </div>
                <div class="image-preview">
                    <h5>Preview Photo</h5>
                    <img src="../Assets/img/1.jpg" alt="">
                </div>
            </div>
        </div>

    </div>

    <!-- footer part -->
    <?php include(INCLUDE_PATH . '/footer.php'); ?>
    <!-- end footer part -->
</body>

</html>