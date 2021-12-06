<!--------------------------------- Signup page part -------------------------------->
<?php
include('../private/initialize.php');
include("../private/database/db.php");
include "../private/helpers/validate.php";
include('../private/controller/user.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Public Art - Register</title>

    <!-- for bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter">
    <!-- Custom Styling -->
    <style>
        <?php //include(PUBLIC_PATH . '/Assets/css/login.css'); 
        ?><?php include(PUBLIC_PATH . '/Assets/css/css.css'); 
            ?><?php //include('public/Assets/css/login.css'); 
                ?><?php //include('public/Assets/css/css.css'); ?><?php include(PUBLIC_PATH . '/Assets/css/edit.css'); ?>
    </style>
</head>

<body>
    <!-- header part -->
    <?php include(INCLUDE_PATH . '/header.php'); 
    ?>
    <?php //include '../private/includes/header.php'; ?>
    <!-- end header part -->

    <!-- display the error in the register form  -->
    <?php include "../private/helpers/formErrors.php"; ?>
    <!-- end display the error in the register form  -->

    <!-- for the login body part -->
    <form action="register.php" method="post">
        <div class="main-containers">
            <h1>CREATE YOUR ACCOUNT</h1>
            <p>Please fill in all fields with *</p>
            <div class="main-box">
                <div class="left-side">
                    <div class="detail-box">
                        <h3>Name*</h3>
                        <input type="text" id="name" class="" name="name" placeholder="name" value="<?php echo $name ?>">
                    </div>
                    <div class="detail-box">
                        <h3>Email*</h3>
                        <input type="email" id="email" class="" name="email" placeholder="email" value="<?php echo $email ?>">
                    </div>
                    <div class="detail-box">
                        <h3>Phone Number*</h3>
                        <input type="number" id="phoneNumber" class="" name="phone" placeholder="phone number" value="<?php echo $phone ?>">
                    </div>
                    <div class="detail-box">
                        <h3>Username* (must be under 30 characters)</h3>
                        <input type="text" id="login" class="" name="username" placeholder="username" value="<?php echo $username ?>">
                    </div>
                    <div class="detail-box">
                        <h3>Password* (must be under 30 characters)*</h3>
                        <input type="password" id="password" class="" name="password" placeholder="password" value="<?php echo $password ?>">
                    </div>
                    <div class="detail-box">
                        <h3>Confirmed Password* (must be under 30 characters)*</h3>
                        <input type="password" id="confirm-password" class="" name="passwordConf" placeholder="confirmed password" value="<?php echo $passwordConf ?>">
                    </div>
                    <button type="submit" class="signUpBtn primaryBtn" name="register-btn">Register</button>
                </div>
                <div class="right-side">
                    <div class="detail-box">
                        <h3>Upload A Profile Photo</h3>
                        <input type="file" id="file" id="uploadBtn">
                    </div>
                    <div class="profile-pic-div">
                        <p>Preview Photo</p>
                        <img src="Assets/img/1.jpg" alt="" id="photo">
                    </div>
                </div>
            </div>

        </div>
    </form>

    <!-- for the photo profile part -->
    <!-- <div class="profile-pic-div">
        <img src="public/Assets/img/1.jpg" alt="" id="photo">
        <input type="file" id="file">
        <label for="file" id="uploadBtn">Choose Photo</label>
    </div> -->
    <!-- end for the photo profile part -->
    <!-- end for the login body part -->

    <!-- for the js code  -->
    <script>
        const imgDiv = document.querySelector('.profile-pic-div');
        const img = document.querySelector('#photo');
        const file = document.querySelector('#file');
        const uploadBtn = document.querySelector('#uploadBtn');

        // if user hover on img div
        imgDiv.addEventListener('mouseenter', function() {
            uploadBtn.style.display = "block";
        });

        // if user hover out from img div
        imgDiv.addEventListener('mouseleave', function() {
            uploadBtn.style.display = "none";
        });

        // for the image uploading part.
        file.addEventListener('change', function() {
            // this mean the file
            const choosedFile = this.files[0];
            if (choosedFile) {
                const reader = new FileReader();

                reader.addEventListener('load', function() {
                    img.setAttribute('src', reader.result);
                });

                reader.readAsDataURL(choosedFile);
            }
        })
    </script>
</body>

</html>