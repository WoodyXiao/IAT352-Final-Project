<!--------------------------------- home page for member part -------------------------------->
<?php include('../private/initialize.php');
include("../private/database/db.php");
include '../private/controller/preference.php';
include '../private/controller/memberHomePageData.php';
include '../private/controller/user.php';
?>

<!-- html part -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Public Art - home page</title>

    <!-- for bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter">
    <!-- Custom Styling -->
    <style>
        <?php include(PUBLIC_PATH . '/Assets/css/css.css'); ?><?php include(PUBLIC_PATH . '/Assets/css/homeForMember.css'); ?>
    </style>
</head>

<body>
    <!-- header part -->
    <?php include(INCLUDE_PATH . '/header.php'); ?>
    <!-- end header part -->

    <!-- flash message when log in successfully -->
    <?php include(INCLUDE_PATH . '/message.php'); ?>
    <!-- end flash message when log in successfully -->

    <!-- for the main part -->
    <div class="main-containers">
        <!-- --------------------- for artist part --------------------------- -->
        <h1><a href="browse.php?artistName=<?php echo $artistName ?>" class="textlink">DECEMBER ARTIST FEATURE - <?php echo $artistName ?> ></a></h1>
        <div class="art-container">
            <?php
            if (!$artistRecord) {
                Header('Location: homePageVisitor.php');
            } else {

            ?>
                <?php
                foreach ($artistRecord as $artist) {

                ?>
                    <?php
                    if ($artist['photoURL'] === "") {
                        $photo = 'Assets/img/1.jpg';
                    } else {
                        $photo = $artist['photoURL'];
                    }
                    ?>

                    <div class="artCard">
                        <div class="imgBox">
                            <a href="art_detail.php?id=<?php echo $artist['artID'] ?>"><img src="<?php echo $photo
                                                                                                    ?>" alt=""></a>
                        </div>
                        <a href="art_detail.php?id=<?php echo $artist['artID'] ?>">
                            <h3 class="textlink"><?php echo $artist['artName']
                                                    ?></h3>
                        </a>
                        <a href="artist_detail.php?artistID=<?php echo $artist['artistID'] ?>">
                            <h5 class="textlink"><?php echo $artist['firstName']
                                                    ?> <?php echo $artist['lastName']
                                    ?> - <?php echo $artist['year']
                                            ?></h5>
                        </a>
                        <div class="descripBox">
                            <p><?php echo $artist['description']
                                ?></p>
                        </div>
                    </div>

            <?php }
            } ?>
        </div>
        <!-- for the artwork from following part -->
        <h2><a class="textlink" href="member/following.php?userID=<?php echo $_SESSION['userID'] ?>">FROM ARTISTS YOU FOLLOW ></a></h2>
        <div class="art-container">

            <?php foreach ($followingData as $follow) { ?>
                <?php
                if ($follow['photoURL'] === "") {
                    $photo = 'Assets/img/1.jpg';
                } else {
                    $photo = $follow['photoURL'];
                }
                ?>
                <div class="artCard">
                    <div class="imgBox">
                        <a href="art_detail.php?id=<?php echo $follow['artID'] ?>"><img src="<?php echo $photo
                                                                                                ?>" alt=""></a>
                    </div>
                    <a href="art_detail.php?id=<?php echo $follow['artID'] ?>">
                        <h3 class="textlink"><?php echo $follow['artName'] ?></h3>
                    </a>
                    <a href="artist_detail.php?artistID=<?php echo $follow['artistID'] ?>">
                        <h5 class="textlink"><?php echo $follow['firstName'] ?> <?php echo $follow['lastName'] ?> - <?php echo $follow['year'] ?></h5>
                    </a>
                    <div class="descripBox">
                        <p><?php echo $follow['description']
                            ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
        <!-- --------------------- for location part --------------------------- -->
        <h2><a class="textlink" href="browse.php?location=<?php echo $randomlocation ?>">ARTWORKS AT <?php echo $randomlocation ?> ></a></h2>
        <div class="art-container">

            <?php foreach ($locationRecord as $location) {
            ?>
                <?php
                if ($location['photoURL'] === "") {
                    $photo = 'Assets/img/1.jpg';
                } else {
                    $photo = $location['photoURL'];
                }
                ?>

                <div class="artCard">
                    <div class="imgBox">
                        <a href="art_detail.php?id=<?php echo $location['artID'] ?>"><img src="<?php echo $photo
                                                                                                ?>" alt=""></a>
                    </div>
                    <a href="art_detail.php?id=<?php echo $location['artID'] ?>">
                        <h3 class="textlink"><?php echo $location['artName']
                                                ?></h3>
                    </a>
                    <a href="artist_detail.php?artistID=<?php echo $location['artistID'] ?>">
                        <h5 class="textlink"><?php echo $location['firstName']
                                                ?> <?php echo $location['lastName']
                                ?> - <?php echo $location['year']
                                        ?></h5>
                    </a>
                    <div class="descripBox">
                        <p><?php echo $location['description']
                            ?></p>
                    </div>
                </div>

            <?php } ?>
        </div>
        <!-- ----------------------- for material part -------------------------- -->
        <h2><a class="textlink" href="browse.php?material=<?php echo $randommaterial ?>">ARTWORKS MADE OF <?php echo $randommaterial ?> ></a></h2>
        <div class="art-container">

            <?php foreach ($materialRecord as $material) {
            ?>
                <?php
                if ($material['photoURL'] === "") {
                    $photo = 'Assets/img/1.jpg';
                } else {
                    $photo = $material['photoURL'];
                }
                ?>

                <div class="artCard">
                    <div class="imgBox">
                        <a href="art_detail.php?id=<?php echo $material['artID'] ?>"><img src="<?php echo $photo
                                                                                                ?>" alt=""></a>
                    </div>
                    <a href="art_detail.php?id=<?php echo $material['artID'] ?>">
                        <h3 class="textlink"><?php echo $material['artName']
                                                ?></h3>
                    </a>
                    <a href="artist_detail.php?artistID=<?php echo $material['artistID'] ?>">
                        <h5 class="textlink"><?php echo $material['firstName']
                                                ?> <?php echo $material['lastName']
                                ?> - <?php echo $material['year']
                                        ?></h5>
                    </a>
                    <div class="descripBox">
                        <p><?php echo $material['description']
                            ?></p>
                    </div>
                </div>

            <?php } ?>
        </div>
        <!-- -------------------- for type part --------------------- -->
        <h2><a class="textlink" href="browse.php?type=<?php echo $randomtype ?>">ARTWORKS TYPE IS <?php echo $randomtype ?> ></a></h2>
        <div class="art-container">

            <?php foreach ($typeRecord as $type) {
            ?>
                <?php
                if ($type['photoURL'] === "") {
                    $photo = 'Assets/img/1.jpg';
                } else {
                    $photo = $type['photoURL'];
                }
                ?>

                <div class="artCard">
                    <div class="imgBox">
                        <a href="art_detail.php?id=<?php echo $type['artID'] ?>">
                            <img src="<?php echo $photo
                                        ?>" alt=""></a>
                    </div>
                    <a href="art_detail.php?id=<?php echo $type['artID'] ?>">
                        <h3 class="textlink"><?php echo $type['artName']
                                                ?></h3>
                    </a>
                    <a href="artist_detail.php?artistID=<?php echo $type['artistID'] ?>">
                        <h5 class="textlink"><?php echo $type['firstName']
                                                ?> <?php echo $type['lastName']
                                ?> - <?php echo $type['year']
                                        ?></h5>
                    </a>
                    <div class="descripBox">
                        <p><?php echo $type['description']
                            ?></p>
                    </div>
                </div>
            <?php }
            ?>
        </div>
    </div>
    <!-- end for the main part -->


    <!-- footer part -->
    <?php include(INCLUDE_PATH . '/footer.php'); ?>
    <!-- end footer part -->
</body>