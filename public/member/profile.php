<!--------------------------------- account profile page part -------------------------------->
<?php include('../../private/initialize.php');
include("../../private/database/db.php");
include "../../private/helpers/validate.php";
include("../../private/controller/userProfile.php");
include("../../private/controller/preference.php");

$table = 'artwork';
$neighborhood = getSpercificData('neighborhood', $table);
$type  = getSpercificData('type', $table);
$material  = getSpercificData('material', $table);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Public Art - account profile</title>

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
        <?php include(PUBLIC_PATH . '/Assets/css/css.css'); ?><?php include(PUBLIC_PATH . '/Assets/css/profile.css'); ?>
    </style>
</head>

<body>
    <!-- header part -->
    <?php include(INCLUDE_PATH . '/header.php'); ?>
    <!-- end header part -->

    <!-- flash message when log in successfully -->
    <?php include(INCLUDE_PATH . '/message.php'); ?>
    <!-- end flash message when log in successfully -->

    <div class="profile-container">
        <h1>PROFILE</h1>
        <div class="profile-box">
            <div class="left-side">
                <h3>PERSONAL INFORMATION</h3>
                <div class="imgBox">
                    <img src="../Assets/img/1.jpg" alt="">
                </div>
                <div class="detail-box">
                    <h4>Name</h4>
                    <h5><?php echo $name ?></h5>
                </div>
                <div class="detail-box">
                    <h4>Username</h4>
                    <h5><?php echo $username ?></h5>
                </div>
                <div class="detail-box">
                    <h4>Email</h4>
                    <h5><?php echo $email ?></h5>
                </div>
                <div class="detail-box">
                    <h4>Phone Number</h4>
                    <h5><?php echo $phoneNumber ?></h5>
                </div>
            </div>
            <form action="profile.php?userID=<?php echo $_SESSION['userID'] ?>" method="POST">
                <div class="right-side">
                    <h3>HOMEPAGE CONTENT PREFERENCE</h3>
                    <h5>Select specific content you would like to see more of on your homepage</h5>
                    <div class="detail-box1">
                        <h4>Neighborhood</h4>
                        <select name="location_selector" id="">
                            <option value="">Select neighborhood</option>
                            <?php
                            foreach ($neighborhood as $row) {
                            ?>
                                <?php
                                if ($row['neighborhood'] == '') {
                                    $data = 'Other';
                                } else {
                                    $data = $row['neighborhood'];
                                }
                                ?>
                                <option value="<?php echo $row['neighborhood']; ?>" <?php if (isset($_SESSION['location_by_user']) && $_SESSION['location_by_user'] === $row['neighborhood']) {
                                                                                        echo "selected";
                                                                                    } else {
                                                                                    } ?>><?php echo $data; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="detail-box1">
                        <h4>Artwork Type</h4>
                        <select name="type_selecotr" id="">
                            <option value="">Select artwork type</option>
                            <?php
                            foreach ($type as $row) {
                            ?>
                                <?php
                                if ($row['type'] == '') {
                                    $data = 'Other';
                                } else {
                                    $data = $row['type'];
                                }
                                ?>
                                <option value="<?php echo $row['type']; ?>" <?php if (isset($_SESSION['type_by_user']) && $_SESSION['type_by_user'] === $row['type']) {
                                                                                echo "selected";
                                                                            } else {
                                                                            } ?>><?php echo $data; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="detail-box1">
                        <h4>Artwork Primary Material</h4>
                        <select name="material_selector" id="">
                            <option value="">Select primary material</option>
                            <?php
                            foreach ($material as $row) {
                            ?>
                                <?php
                                if ($row['material'] == '') {
                                    $data = 'Other';
                                } else {
                                    $data = $row['material'];
                                }
                                ?>
                                <option value="<?php echo $row['material']; ?>"><?php echo $data; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <button class="savePreBtn" name="savePreBtn">Save Preference</button>
            </form>
            <div class="historyBox">
                <h3>COMMENT HISTORY</h3>
                <a href="commentHistory.php?userID=<?php echo $userid ?>">
                    <h5>Browse and manage comments you've posted ></h5>
                </a>
            </div>
        </div>
    </div>
    <button class="editBtn"><a href="editProfile.php?userID=<?php echo $userid ?>">Edit Profile</a></button>
    </div>

    <!-- footer part -->
    <?php include(INCLUDE_PATH . '/footer.php'); ?>
    <!-- end footer part -->
</body>

</html>