<!--------------------------------- comment history page part -------------------------------->
<?php include('../../private/initialize.php');
include("../../private/database/db.php");
include "../../private/helpers/validate.php";
include("../../private/controller/getcommentHistory.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Public Art - comment history</title>

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
        <?php include(PUBLIC_PATH . '/Assets/css/css.css'); ?><?php include(PUBLIC_PATH . '/Assets/css/commentHistory.css'); ?>
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
    <div class="history-container">
        <h1>COMMENT HISTORY</h1>

        <?php foreach ($history as $row) { ?>

            <div class="history-box" id="cmt<?php echo $row['commentID'] ?>">
                <div class="left-side">
                    <h3><?php echo $row['date'] ?></h3>
                </div>
                <div class="right-side">
                    <a href="<?php echo url_for('art_detail.php?id=' . $row['artID']) ?>">
                        <h2 class="textlink"><?php echo $row['artName'] ?></h2>
                    </a>
                    <a href="<?php echo url_for('art_detail.php?id=' . $row['artID']) . '#' . $row['username'] ?>">
                        <p class="textlink"><?php echo $row['commentText'] ?></p>
                    </a>
                    <button name='removeBtn' class="removeBtn secondaryBtn" onclick="removeComment(<?php echo $row['commentID'] ?>)">Remove Comment</button>
                </div>
            </div>

        <?php } ?>
    </div>
    <!-- end for the main part -->

    <!-- footer part -->
    <?php include(INCLUDE_PATH . '/footer.php'); ?>
    <!-- end footer part -->

    <!-- for the jquery code -->
    <script type="text/javascript" src="../Assets/js/removeComment.js">
    </script>
    <!-- end for the jquery code -->
</body>

</html>