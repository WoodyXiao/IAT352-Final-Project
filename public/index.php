<!--------------------------------- index page part -------------------------------->
<?php
include('../private/initialize.php');
include("../private/database/db.php");
include '../private/controller/user.php';
// if user did not log in, will redirect to the page the for visiotr.
// otherwise will direct to the page that for memeber.
if (isset($_SESSION['userID'])) {
    header('location: homePageMember.php');
} else {
    header('location: homePageVisitor.php');
}
