<!--------------------------------- art detail page part -------------------------------->
<?php include('private/initialize.php');
include("private/database/db.php");
include('private/controller/user.php');
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

    $favourite = selectOneByOneTable($table3, ['userID'=> $user_id,'artID' =>$id]);
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
    <!-- Custom Styling -->
    <style>
        <?php include(PUBLIC_PATH . '/Assets/css/css.css'); ?>
        <?php include(PUBLIC_PATH . '/Assets/css/art_detail.css'); ?>            
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
                <?php if(isset($_SESSION['userID']) && !$favourite){?>               
                    <button name="favBtn" class="favBtn">Add to Favourites</button>
                <?php }else if(isset($_SESSION['userID']) && $favourite) {?>
                    <input type="hidden" name="id" class="favID" value="<?php echo $favourite['favID'] ?>">
                    <button name="unSaveBtn" class="unSaveBtn" >Saved already</button>
                <?php }else{ }?>
            </div>

            <h4><a href="artist_detail.php?artistID=<?php echo $artistID ?>"><?php echo $firstName ?> <?php echo $lastName ?> <span><?php echo $year ?></span></a></h4>

            <!-- for rating system part -->
            <div class="">
                <h4 id="rate-message">Rate this artwork</h4>
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
                        <h4>Year Of Installation</h4>
                        <h5><?php echo $year ?></h5>
                    </div>
                    <div class="detail-box">
                        <h4>Country</h4>
                        <h5><?php echo $country ?></h5>
                    </div>
                    <div class="detail-box">
                        <h4>Primary Material</h4>
                        <h5><?php echo $meterial ?></h5>
                    </div>
                    <div class="detail-box">
                        <h4>Type</h4>
                        <h5><?php echo $type ?></h5>
                    </div>
                    <div class="detail-box">
                        <h4>Status</h4>
                        <h5><?php echo $status ?></h5>
                    </div>
                    <div class="detail-box">
                        <h4>Ownership</h4>
                        <h5><?php echo $ownership ?></h5>
                    </div>
                    <div class="detail-box">
                        <h4>Neighborhood</h4>
                        <h5><?php echo $neighborhood ?></h5>
                    </div>
                    <div class="detail-box">
                        <h4>Location</h4>
                        <h5><?php echo $siteName ?></h5>
                        <h5> <?php echo $siteAddress ?> </h5>
                    </div>
                    <div class="detail-box">
                        <h5>Location on site:</h5>
                        <h5><?php echo $locationOnSite ?></h5>
                    </div>
                </div>
                <div class="right-side">
                    <div class="detail-box1">
                        <h4>Description</h4>
                        <p><?php echo $description ?></p>
                    </div>
                    <div class="detail-box1">
                        <h4>Artist Statement</h4>
                        <p><?php echo $artistStatement ?></p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- </form> -->



    <!-- for the comment body part -->
    <div class="container" id="comment-container">
        <h4><span class="count-of-comment"></span> Comments</h4>
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
        <button class="post-btn">POST</button>

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
    <script type="text/javascript" src="public/Assets/js/comment_rating.js"></script>
    <script type="text/javascript" src="public/Assets/js/favourite.js"></script>

</body>

</html>