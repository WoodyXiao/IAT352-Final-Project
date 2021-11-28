<!--------------------------------- home page for non-member part -------------------------------->
<?php include('private/initialize.php');
include("private/database/db.php");
include 'private/controller/user.php';
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
    <!-- Custom Styling -->
    <style>
        <?php include(PUBLIC_PATH . '/Assets/css/css.css'); ?><?php include(PUBLIC_PATH . '/Assets/css/homeForVisitor.css'); ?>
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
        <h1><a href="">DECEMBER ARTIST FEATURE - PAUL HUBA ></a></h1>
        <div class="art-container">
            <div class="artCard">
                <div class="imgBox">
                    <a href=""><img src="public/Assets/img/1.jpg" alt=""></a>
                </div>
                <a href="">
                    <h3>Untitled (Tile Mural of a Woman and Child)</h3>
                </a>
                <a href="">
                    <h5>Paul Huba - 1958</h5>
                </a>
                <div class="descripBox">
                    <p>Description of artworkkkkkkkkkkkkk dsdsdsdsdsdsddsddsd kjalkfjwfhjkrjlclakjfmwl;jfawekjfhkhfkj ...</p>
                </div>
            </div>
            <div class="artCard">
                <div class="imgBox">
                    <a href=""><img src="public/Assets/img/1.jpg" alt=""></a>
                </div>
                <a href="">
                    <h3>Untitled (Tile Mural of a Woman and Child)</h3>
                </a>
                <a href="">
                    <h5>Paul Huba - 1958</h5>
                </a>
                <div class="descripBox">
                    <p>Description of artworkkkkkkkkkkkkk dsdsdsdsdsdsddsddsd kjalkfjwfhjkrjlclakjfmwl;jfawekjfhkhfkj ...</p>
                </div>
            </div>
        </div>
        <!-- for location part -->
        <h3><a href="">DOWNTOWN ></a></h3>
        <div class="art-container">
            <div class="artCard">
                <div class="imgBox">
                    <a href=""><img src="public/Assets/img/1.jpg" alt=""></a>
                </div>
                <a href="">
                    <h3>Untitled (Tile Mural of a Woman and Child)</h3>
                </a>
                <a href="">
                    <h5>Paul Huba - 1958</h5>
                </a>
                <div class="descripBox">
                    <p>Description of artworkkkkkkkkkkkkk dsdsdsdsdsdsddsddsd kjalkfjwfhjkrjlclakjfmwl;jfawekjfhkhfkj ...</p>
                </div>
            </div>
        </div>
        <!-- for material part -->
        <h3><a href="">ARTWORKS WITH BRONZE ></a></h3>
        <div class="art-container">
            <div class="artCard">
                <div class="imgBox">
                    <a href=""><img src="public/Assets/img/1.jpg" alt=""></a>
                </div>
                <a href="">
                    <h3>Untitled (Tile Mural of a Woman and Child)</h3>
                </a>
                <a href="">
                    <h5>Paul Huba - 1958</h5>
                </a>
                <div class="descripBox">
                    <p>Description of artworkkkkkkkkkkkkk dsdsdsdsdsdsddsddsd kjalkfjwfhjkrjlclakjfmwl;jfawekjfhkhfkj ...</p>
                </div>
            </div>
        </div>
        <!-- for type part -->
        <h3><a href="">SCULPTURE ></a></h3>
        <div class="art-container">
            <div class="artCard">
                <div class="imgBox">
                    <a href=""><img src="public/Assets/img/1.jpg" alt=""></a>
                </div>
                <a href="">
                    <h3>Untitled (Tile Mural of a Woman and Child)</h3>
                </a>
                <a href="">
                    <h5>Paul Huba - 1958</h5>
                </a>
                <div class="descripBox">
                    <p>Description of artworkkkkkkkkkkkkk dsdsdsdsdsdsddsddsd kjalkfjwfhjkrjlclakjfmwl;jfawekjfhkhfkj ...</p>
                </div>
            </div>
        </div>
    </div>
    <!-- end for the main part -->


    <!-- footer part -->
    <?php include(INCLUDE_PATH . '/footer.php'); ?>
    <!-- end footer part -->
</body>

</html>