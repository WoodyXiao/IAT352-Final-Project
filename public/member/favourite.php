<!--------------------------------- favourite list page part -------------------------------->
<?php include('../../private/initialize.php');
include("../../private/database/db.php");
include("../../private/controller/getfavourite.php");

?>

<!-- html part -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Public Art - favourite page</title>

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
        <?php //include(PUBLIC_PATH . '/Assets/css/login.css'); 
        ?><?php //include(PUBLIC_PATH . '/Assets/css/css.css'); 
            ?><?php include('../Assets/css/css.css'); ?><?php include(PUBLIC_PATH . '/Assets/css/favourite.css'); ?>
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
        <h1>FAVOURITE ARTWORKS</h1>
        <div class="detail-box">
            <?php foreach ($favouriteData as $fav) { ?>
                <?php if ($fav['photoURL']) {
                    $photo = $fav['photoURL'];
                } else {
                    $photo = '../Assets/img/1.jpg';
                } ?>

                <div class="artCard" id="fav<?php echo $fav['favID'] ?>">
                    <div class="imgBox">
                        <a href="../art_detail.php?id=<?php echo $fav['artID'] ?>">
                            <img src="<?php echo $photo ?>" alt="">
                        </a>
                    </div>
                    <a href="../art_detail.php?id=<?php echo $fav['artID'] ?>">
                        <h3><?php echo $fav['artName'] ?></h3>
                    </a>
                    <a href="../artist_detail.php?artistID=<?php echo $fav['artistID'] ?>">
                        <h5><?php echo $fav['firstName'] ?> <?php echo $fav['lastName'] ?> - <?php echo $fav['year'] ?></h5>
                    </a>
                    <div class="descripBox">
                        <p><?php echo $fav['description'] ?></p>
                    </div>
                    <button class="removeBtn" onclick="removeFavouritesList(<?php echo $fav['favID'] ?>)">Remove From List</button>
                </div>
            <?php } ?>
        </div>

    </div>
    <!-- end for the main part -->

    <!-- footer part -->
    <?php include(INCLUDE_PATH . '/footer.php'); ?>
    <!-- end footer part -->

    <!-- for the jquery code -->
    <script type="text/javascript" src="../Assets/js/removeFavourite.js">
    </script>
    <!-- end for the jquery code -->
</body>

</html>