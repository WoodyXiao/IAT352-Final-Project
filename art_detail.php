<!--------------------------------- art detail page part -------------------------------->
<?php include('private/initialize.php');
include("private/database/db.php");
include('private/controller/user.php');
?>

<?php
$table1 = 'artwork';
$table2 = 'artist';
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
}

?>

<!-- html part -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>

    <!-- for bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- Custom Styling -->
    <style>
        <?php include(PUBLIC_PATH . '/Assets/css/css.css'); ?>
    </style>
</head>

<body>
    <!-- header part -->
    <?php include(INCLUDE_PATH . '/header.php'); ?>
    <!-- end header part -->

    <!-- <form action="art_detail.php" method="post"> -->
    <input type="hidden" name="id" value="<?php echo $id ?>">
    <div class="container">
        <?php if ($photoURL != '') {
            $photo = $photoURL;
        } else {
            $photo = 'public/Assets/img/1.jpg';
        }
        ?>
        <img src="<?php echo $photo ?>" alt="">
        <div class="text-container">
            <h1><?php echo $title ?></h1>
            <h4><?php echo $firstName ?> <?php echo $lastName ?></h4>
            <h5><?php echo $year ?></h5>
            <h5><?php echo $country ?></h5>
            <h5><?php echo $type ?></h5>
            <h5><?php echo $meterial ?></h5>
            <h5><?php echo $status ?></h5>
            <h5><?php echo $year ?></h5>
            <h4><?php echo $siteName ?></h4>
            <h5> <?php echo $siteAddress ?> <span> <?php echo $neighborhood ?> </span></h5>
            <p><?php echo $description ?></p>
        </div>
        <button class="commentBtn">Comment</button>
    </div>
    <!-- </form> -->

    <!-- for the comment body part -->

    <!-- end for the comment body part  -->
</body>

</html>