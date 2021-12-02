<!-- for the nav bar container -->
<?php
// include('../initialize.php');
?>
<header>
    <div class="logo">
        <a href="<?php echo url_for('/index.php') ?>">
            <h1 class="logo-text"><span>VANCOUVER </span>PUBLIC ART</h1>
        </a>
    </div>
    <i class="fa fa-bars menu-toggle"></i>
    <ul class="nav">
        <li><a href="<?php echo url_for('/index.php') ?>">Browse</a></li>


        <!--  if user log in successfully, show the account name  -->
        <?php if (isset($_SESSION['userID'])) { ?>
            <!-- <li><a href="<?php //echo PUBLIC_URL . 'member/favourite.php?userID=' .$_SESSION['userID'] 
                                ?>">Favourites</a></li> -->
            <!-- <li><a href="<?php //echo PUBLIC_URL . 'member/following.php?userID=' .$_SESSION['userID'] 
                                ?>">Following</a></li> -->
            <li><a href="<?php echo url_for('member/favourite.php?userID=' . $_SESSION['userID']) ?>">Favourites</a></li>
            <li><a href="<?php echo url_for('member/following.php?userID=' . $_SESSION['userID']) ?>">Following</a></li>


            <li>
                <a href="#">
                    <i class="fa fa-user"></i>
                    <?php echo $_SESSION['username']; ?>
                    <i class="fa fa-chevron-down" style="font-size: .8em;"></i>
                </a>
                <ul>
                    <!-- <li><a href="<?php //echo PUBLIC_URL . 'member/profile.php?userID=' .  $_SESSION['userID'] 
                                        ?>">Profile</a></li>
                    <li><a href="logout.php" class="logout">Logout</a></li> -->
                    <li><a href="<?php echo url_for('member/profile.php?userID=' .  $_SESSION['userID']) ?>">Profile</a></li>
                    <li><a href="<?php echo url_for("logout.php") ?>" class="logout">Logout</a></li>
                </ul>
            </li>


            <!-- otherwise, show the button of login and sign up only -->
        <?php } else { ?>
            <li><a href="register.php">Sign Up</a></li>
            <li><a href="login.php">Login</a></li>
        <?php } ?>

    </ul>
</header>
<!-- end for the nav bar container -->