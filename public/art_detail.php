<!--------------------------------- art detail page part -------------------------------->
<?php include('../private/initialize.php');
include("../private/database/db.php");
include('../private/controller/user.php');
?>

<?php
$table1 = 'artwork';
$table2 = 'artist';
$table3 = 'favouriteslist';
// ---------- show one artwork detail ---------- //
if (isset($_GET['id'])) { // ---> if there is an exist id.
    $id = $_GET['id'];

    $art = selectOne($table1, $table2, ['artID' => $id]);
    $id = $art['artID'];
    $title = $art['artName'];
    $status = $art['status'];
    $siteName = $art['siteName'];
    $meterial = $art['material'];
    $photoURL = $art['photoURL'];
    $neighborhood = $art['neighborhood'];
    $year = $art['year'];
    $firstName = $art['firstName'];
    $lastName = $art['lastName'];
    $country = $art['country'];
    $type = $art['type'];
    $siteAddress = $art['siteAddress'];
    $description = $art['description'];
    $artistStatement = $art['artistStatement'];
    $ownership = $art['ownership'];
    $locationOnSite = $art['locationOnSite'];
    $artistID = $art['artistID'];
    // 
    $_SESSION['artID'] = $id;
    // call the function for showing rating so far.
    $average_rating = showRating($id);
}

if (isset($_SESSION['userID'])) {
    $user_id = $_SESSION['userID'];

    $favourite = selectOneByOneTable($table3, ['userID' => $user_id, 'artID' => $id]);
}



?>

<!-- html part -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Public Art - <?php echo $title ?></title>

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
        <?php include(PUBLIC_PATH . '/Assets/css/css.css'); ?><?php include(PUBLIC_PATH . '/Assets/css/art_detail.css'); ?>
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

    <!-- <form action="art_detail.php" method="post"> -->
    <!-- save the art id -->
    <input type="hidden" name="id" class="artID" value="<?php echo $id ?>">
    <input type="hidden" name="id" class="userID" value="<?php echo $user_id ?>">
    <div class="container">
        <?php if ($photoURL != '') {
            $photo = $photoURL;
        } else {
            $photo = 'public/Assets/img/1.jpg';
        }
        ?>
        <div class="text-container">
            <div class="title-and-button">
                <h1><?php echo $title ?></h1>
                <?php if (isset($_SESSION['userID']) && !$favourite) { ?>
                    <button name="favBtn" class="favBtn">Add to Favourites</button>
                <?php } else if (isset($_SESSION['userID']) && $favourite) { ?>
                    <input type="hidden" name="id" class="favID" value="<?php echo $favourite['favID'] ?>">
                    <button name="unSaveBtn" class="unSaveBtn">Saved already</button>
                <?php } else {
                } ?>
            </div>

            <h3><a href="artist_detail.php?artistID=<?php echo $artistID ?>"><?php echo $firstName ?> <?php echo $lastName ?> <span><?php echo "- ".$year ?></span></a></h3>

            <!-- for rating system part -->
            <div class="">
                <p id="rate-message">Rate this artwork</p>
                <span class="fa fa-star <?php echo ($average_rating['avgRating'] >= 1) ? 'checked' : ''; ?>" id="star1" value='1'></span>
                <span class="fa fa-star <?php echo ($average_rating['avgRating'] >= 2) ? 'checked' : ''; ?>" id="star2" value='2'></span>
                <span class="fa fa-star <?php echo ($average_rating['avgRating'] >= 3) ? 'checked' : ''; ?>" id="star3" value='3'></span>
                <span class="fa fa-star <?php echo ($average_rating['avgRating'] >= 4) ? 'checked' : ''; ?>" id="star4" value='4'></span>
                <span class="fa fa-star <?php echo ($average_rating['avgRating'] >= 5) ? 'checked' : ''; ?>" id="star5" value='5'></span>
                <p>Average: <span id="average"><?php echo $average_rating['avgRating'] ?></span> base on <span id="totalRating"><?php echo $average_rating['ratingNum'] ?> </span>rating</p>
            </div>
            <!-- end for rating system part -->

            <img src="<?php echo $photo ?>" alt="">
            <div class="details-container">
                <div class="left-side">
                    <div class="detail-box">
                        <h2>Year Of Installation</h2>
                        <p><?php echo $year ?></p>
                    </div>
                    <div class="detail-box">
                        <h2>Country</h2>
                        <p><?php echo $country ?></p>
                    </div>
                    <div class="detail-box">
                        <h2>Primary Material</h2>
                        <p><?php echo $meterial ?></p>
                    </div>
                    <div class="detail-box">
                        <h2>Type</h2>
                        <p><?php echo $type ?></p>
                    </div>
                    <div class="detail-box">
                        <h2>Status</h2>
                        <p><?php echo $status ?></p>
                    </div>
                    <div class="detail-box">
                        <h2>Ownership</h2>
                        <p><?php echo $ownership ?></p>
                    </div>
                    <div class="detail-box">
                        <h2>Neighborhood</h2>
                        <p><?php echo $neighborhood ?></p>
                    </div>
                    <div class="detail-box">
                        <h2>Location</h2>
                        <p><?php echo $siteName ?></p>
                        <p> <?php echo $siteAddress ?> </p>
                    </div>
                    <div class="detail-box">
                        <h4>Location on site:</h4>
                        <p><?php echo $locationOnSite ?></p>
                    </div>
                </div>
                <div class="right-side">
                    <div class="detail-box1">
                        <h2>Description</h2>
                        <p><?php echo $description ?></p>
                    </div>
                    <div class="detail-box1">
                        <h2>Artist Statement</h2>
                        <p><?php echo $artistStatement ?></p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- </form> -->



    <!-- for the comment body part -->
    <div class="container" id="comment-container">
        <h2><span class="count-of-comment"></span> Comments</h2>
        <span id="error_status"></span>
        <div class="comment-box">
            <textarea name="comment" id="comment" cols="100" rows="10" style="resize: none;" <?php if (!isset($_SESSION['userID'])) {
                                                                                                    echo "disabled";
                                                                                                } else {
                                                                                                    echo 'placeholder="Add comment here"';
                                                                                                }  ?>></textarea>
            <?php
            if (!isset($_SESSION['userID'])) {
                echo "<p class='comment_mess'><a href='login.php' style='cursor:pointer; text-decoration:underline'>Log in</a> to add a comment!!</p>";
            }
            ?>
        </div>
        <button class="post-btn">Post Comment</button>

        <!-- displaying comment container part -->
        <div class="display-comment-box">

        </div>
        <!-- end displaying comment container part -->

    </div>
    <!-- end for the comment body part  -->

    <!-- footer part -->
    <?php include(INCLUDE_PATH . '/footer.php'); ?>
    <!-- end footer part -->
    <!-- jquery code part -->
    <script type="text/javascript" src="Assets/js/comment_rating.js"></script>
    <script type="text/javascript" src="Assets/js/favourite.js"></script>

</body>

</html>