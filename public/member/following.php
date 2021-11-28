<!--------------------------------- following list page part -------------------------------->
<?php include('../../private/initialize.php');
include("../../private/database/db.php");
?>

<!-- html part -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Public Art - favourite page</title>

    <!-- for bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- Custom Styling -->
    <style>
        <?php include('../Assets/css/css.css'); ?><?php include(PUBLIC_PATH . '/Assets/css/following.css'); ?>
    </style>
</head>

<body>
    <!-- header part -->
    <?php include(INCLUDE_PATH . '/header.php'); ?>
    <!-- end header part -->

    <!-- for the main part -->
    <div class="main-containers">
        <h1>ARTISTS YOU FOLLOW</h1>
        <div class="artistList">
            <div class="artistBox">
                <a href="">
                    <h4>Noel Best</h4>
                </a>
                <i class="far fa-times-circle"></i>
            </div>
            <div class="artistBox">
                <a href="">
                    <h4>Noel Best</h4>
                </a>
                <i class="far fa-times-circle"></i>
            </div>
            <div class="artistBox">
                <a href="">
                    <h4>Noel Best</h4>
                </a>
                <i class="far fa-times-circle"></i>
            </div>
            <div class="artistBox">
                <a href="">
                    <h4>Noel Best</h4>
                </a>
                <i class="far fa-times-circle"></i>
            </div>
        </div>
    </div>

    <!-- footer part -->
    <?php include(INCLUDE_PATH . '/footer.php'); ?>
    <!-- end footer part -->
</body>