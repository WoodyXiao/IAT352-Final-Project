<!--------------------------------- following list page part -------------------------------->
<?php include('../../private/initialize.php');
include("../../private/database/db.php");
include("../../private/controller/getfollowing.php");

?>

<!-- html part -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Public Art - following page</title>

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
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter">
    <!-- Custom Styling -->
    <style>
        <?php include('../Assets/css/css.css'); ?><?php include(PUBLIC_PATH . '/Assets/css/following.css'); ?>
    </style>
</head>

<body>
    <!-- header part -->
    <?php include(INCLUDE_PATH . '/header.php'); ?>
    <!-- end header part -->

    <!-- flash message when log in successfully -->
    <?php include(INCLUDE_PATH . '/message.php'); ?>
    <!-- end flash message when log in successfully -->

    <div class="msg">
        <li></li>
    </div>

    <!-- for the main part -->
    <div class="main-containers">
        <h1>ARTISTS YOU FOLLOW</h1>
        <div class="artistList">
            <?php foreach ($followingData as $follow) { ?>
                <div class="artistBox" id="follow<?php echo $follow['followID'] ?>">
                    <a href="../artist_detail.php?artistID=<?php echo $follow['artistID'] ?>">
                        <h2 class="textlink"><?php echo $follow['firstName'] ?> <?php echo $follow['lastName']  ?></h2>
                    </a>
                    <i class="fas fa-times removeBtn" style="cursor:pointer;" onclick="removeFollowingList(<?php echo $follow['followID'] ?>)"></i>
                </div>
            <?php } ?>
        </div>
    </div>
    <!-- <i class="fas fa-times"></i> fa-times-circle -->
    <!-- footer part -->
    <?php include(INCLUDE_PATH . '/footer.php'); ?>
    <!-- end footer part -->

    <!-- for the jquery code -->
    <script type="text/javascript" src="../Assets/js/removeFollowing.js">
    </script>
    <!-- end for the jquery code -->
</body>