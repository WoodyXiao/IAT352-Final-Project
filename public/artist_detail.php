<!--------------------------------- artist details page part -------------------------------->
<?php
include('../private/initialize.php');
include("../private/database/db.php");
include('../private/controller/user.php');
?>

<?php
$table = 'artist';
$table2 = 'followinglist';
// ---------- show one artist detail ----------
if (isset($_GET['artistID'])) {
    $artistID = $_GET['artistID'];
    $artist = selectOneByOneTable($table, ['artistID' => $artistID]);

    if ($artist['country'] === '') {
        $country = 'Other';
    } else {
        $country = $artist['country'];
    }
    if ($artist['website'] === '' || $artist['website'] === ' ' || $artist['website'] === NULL) {
        $link = '';
        $website = 'No Link';
    } else {
        $link = $artist['website'];
        $website = $artist['website'];
    }
    if ($artist['biography'] == '') {
        $biography = 'No biography';
    } else {
        $biography = $artist['biography'];
    }
    if ($artist['artistPhotoURL'] == '') {
        $artistPhotoURL = 'public/Assets/img/1.jpg';
    } else {
        $artistPhotoURL = $artist['artistPhotoURL'];
    }
    $fname = $artist['firstName'];
    $lname = $artist['lastName'];
}

if (isset($_SESSION['userID'])) {
    $user_id = $_SESSION['userID'];

    $follwing = selectOneByOneTable($table2, ['userID' => $user_id, 'artistID' => $artistID]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Public Art - <?php echo $fname ?> <?php echo $lname ?></title>

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
        <?php include(PUBLIC_PATH . '/Assets/css/css.css'); ?>.container {
            height: auto;
            min-height: 600px;
            padding-left: 80px;
            padding-left: 80px;
            width: 80%;
        }

        .extra-part {
            height: auto;
            padding-left: 320px;

        }

        .container .text-container {
            margin-top: 30px;
        }

        .container .text-container img {
            width: 600px;
            height: auto;
        }

        .container .text-container .title-and-button {
            display: flex;
            justify-content: space-between;
        }

        .container .text-container .details-container {
            display: flex;
            justify-content: space-between;
            margin-top: 80px;
        }

        .container .text-container .details-container .left-side {}


        .container .text-container .details-container .left-side .detail-box {
            margin-bottom: 20px;
        }

        .container .text-container .details-container .right-side {
            width: 800px;
        }

        .container .text-container .details-container .right-side .detail-box1 {
            margin-bottom: 40px;
        }
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
    <div class="container">
        <!-- save the artist id and user id -->
        <input type="hidden" name="id" class="artistID" value="<?php echo $artistID ?>">
        <input type="hidden" name="id" class="userID" value="<?php echo $user_id ?>">
        <div class="text-container">
            <div class="title-and-button">
                <h1><?php echo $fname ?> <?php echo $lname ?></h1>
                <?php if (isset($_SESSION['userID']) && !$follwing) { ?>
                    <button class="followBtn secondaryBtn">Follow</button>
                <?php } else if (isset($_SESSION['userID']) && $follwing) { ?>
                    <input type="hidden" name="id" class="followID" value="<?php echo $follwing['followID'] ?>">
                    <button name="unSaveBtn" class="unSaveBtn secondaryBtn">Followed already</button>
                <?php } else {
                } ?>
            </div>

            <img src="<?php echo $artistPhotoURL ?>" alt="">

            <div class="details-container">
                <div class="left-side">
                    <div class="detail-box">
                        <h2>Resident</h2>
                        <p><?php echo $country ?></p>
                    </div>
                    <div class="detail-box">
                        <h2>Website</h2>
                        <a class="textlink" href="<?php echo $link ?>"><?php echo $website ?></a>
                    </div>
                </div>

                <div class="right-side">
                    <div class="detail-box1">
                        <h2>Biography</h2>
                        <p><?php echo $biography ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end for the main part -->
    <div class="container" id="">
        <a href="index.php">
            <h2 class="textlink">Browse artworks by <?php echo $fname ?> <?php echo $lname ?> ></h2>
        </a>
    </div>

    <!-- footer part -->
    <?php include(INCLUDE_PATH . '/footer.php'); ?>
    <!-- end footer part -->

    <!-- jquery code part -->
    <script type="text/javascript" src="Assets/js/following.js"></script>
</body>

</html>