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
    $artistStatement = $art['artistStatement'];
    $ownership = $art['ownership'];
    $locationOnSite = $art['locationOnSite'];
    // 
    $_SESSION['artID'] = $id;
    // call the function for showing rating so far.
    $average_rating = showRating($id);
}

if (isset($_SESSION['userID'])) {
    $user_id = $_SESSION['userID'];
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
        <?php include(PUBLIC_PATH . '/Assets/css/css.css'); ?>#comment-container {
            height: auto;
            min-height: 700px;
            margin-top: 50px;
        }

        textarea {
            width: 100%;
        }

        .post-btn {
            float: right;
        }

        .container {
            height: auto;
            padding-left: 80px;
            padding-left: 80px;
            width: 80%;
        }

        .container .comment-box {
            width: 100%;
            display: flex;
            margin-top: 20px;
            margin-bottom: 30px;

        }

        .container .display-comment-box .display-comment {
            width: 100%;
            display: flex;
            margin-top: 20px;
            margin-bottom: 30px;
        }

        .container .comment-box {
            position: relative;
        }

        .container .comment-box .comment_mess {
            position: absolute;

            left: 42%;
            top: 80px;

        }

        .container .display-comment-box .display-comment .profile img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
        }

        .container .display-comment-box .display-comment .comment-body {
            margin-left: 20px;
        }

        .container .display-comment-box .display-comment .comment-body .name-and-time {
            display: flex;
        }

        .checked {
            color: orange;
        }

        .clicked {
            color: lightcoral;
        }

        .hover {
            color: lightcoral;
        }

        .container .text-container {
            margin-top: 30px;
        }

        .container .text-container img {
            width: 600px;
            height: auto;
        }

        .container .text-container .title-and-button {
            display: flex;
            justify-content: space-between;
        }

        .container .text-container .details-container {
            display: flex;
            justify-content: space-between;
            margin-top: 80px;
        }

        .container .text-container .details-container .left-side {}


        .container .text-container .details-container .left-side .detail-box {
            margin-bottom: 20px;
        }

        .container .text-container .details-container .right-side {
            width: 800px;
        }

        .container .text-container .details-container .right-side .detail-box1 {
            margin-bottom: 40px;
        }
    </style>
</head>

<body>
    <!-- header part -->
    <?php include(INCLUDE_PATH . '/header.php'); ?>
    <!-- end header part -->

    <!-- flash message when log in successfully -->
    <?php include(INCLUDE_PATH . '/message.php'); ?>
    <!-- end flash message when log in successfully -->

    <!-- <form action="art_detail.php" method="post"> -->
    <input type="hidden" name="id" class="artID" value="<?php echo $id ?>">
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
                <button class="favBtn">Add to Favourites</button>
            </div>

            <h4><?php echo $firstName ?> <?php echo $lastName ?> <span><?php echo $year ?></span></h4>

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
    <script>
        // for the start rating systm 
        $(document).ready(function() {
            $('span.fa').mouseover(function() {
                var current = $(this);
                $("span.fa").each(function(index) {
                    $('span.fa').removeClass("clicked");

                    $(this).addClass("hover");
                    if (index === current.index() - 1) {
                        return false;
                    }
                });
            });
            $('span.fa').mouseleave(function() {

                $('span.fa').removeClass("hover");
            });
            $('span.fa').click(function(e) {
                e.preventDefault();
                $('span.fa').removeClass("clicked");
                $('span.fa').removeClass("checked");

                $('.hover').addClass("clicked");
                $('#rate-message').html("Thanks! You have rated this " + $(".clicked").length + " stars. ");

                // ---- for the inserting rate ----
                var artID = $('.artID').val();
                var ratingNum = $(".clicked").length;
                // var ratingNum = $('span.fa').val();
                var data = {
                    artID: artID,
                    ratingNum: ratingNum,
                    add_rating: true,
                }
                $.ajax({
                    type: "POST",
                    url: "rating/rating.php",
                    data: data,
                    success: function(res) {
                        console.log("sdsd");
                        console.log(res);
                        if (res.status == 1) {
                            $("#average").html("" + res.data.avgRating);
                            $("#totalRating").html("" + res.data.ratingNum);


                        } else if (res.status == 2) {
                            $("#average").html("" + res.data.avgRating);
                            $("#totalRating").html("" + res.data.ratingNum);
                        }
                        $('span.fa').each(function() {
                            if ($(this).val() <= parseInt(res.data.avgRating)) {
                                $(this).attr('checked', 'checked');
                            } else {
                                $(this).prop("checked", false);
                            }
                        });
                    }
                });
            });


            var artID = $('.artID').val();
            load_comment(); // ---> run the function.
            // for loading the comment and display part

            function load_comment() {
                var artID = $('.artID').val();
                $.post("comment/comment.php", {
                    artID: artID,
                    comment_load_data: true
                }, function(res) {
                    res = JSON.parse(res)
                    console.log(res);
                    if (typeof res === 'string') {
                        $('.display-comment-box').html("");
                        $('.display-comment-box').append('<p>' + res + '</p>');
                    }
                    if (typeof res != 'string') {
                        count = 0;
                        $('.display-comment-box').html("");
                        $.each(res, function(key, value) {

                            $('.display-comment-box').append('<div class="display-comment">\
                            <div class="profile">\
                                <img src="public/Assets/img/1.jpg" alt="">\
                            </div>\
                            <div class="comment-body">\
                                <div class="name-and-time">\
                                    <a href="">\
                                        <p style="font-weight:bold">' + value.user['username'] + '</p>\
                                    </a>\
                                    <p class="time" style="margin-left:5px; ">' + value.cmt['date'] + '</p>\
                                </div>\
                                <div class="comment-content">\
                                    <p>' + value.cmt['commentText'] + '</p>\
                                </div>\
                            </div>\
                        </div>\
                    ');
                            count++;
                        });

                        //show the number of comment 
                        $('.count-of-comment').html(count);
                    }

                });
            }

            // for the post click event part
            $('.post-btn').click(function(e) {
                e.preventDefault();

                var msg = $('#comment').val();
                var artID = $('.artID').val();
                if ($.trim(msg).length == 0) {
                    error_msg = '(Please type comment!!)';
                    $('#error_status').html('<p>' + error_msg + '</p>')
                } else {
                    error_msg = '';
                    $('#error_status').html("")
                }
                if (error_msg != '') {
                    return false;
                } else {

                    var data = {
                        msg: msg,
                        artID: artID,
                        add_comment: true,
                    };
                    $.ajax({
                        type: "POST",
                        url: "comment/comment.php",
                        data: data,
                        success: function(responese) {
                            $('#comment').val("");
                            load_comment()

                        }

                    });
                }

            })

            // timer for close the message
            setTimeout(function() {
                $('.msg').fadeOut();
            }, 6000);

            $('.msg').mouseover(function() {
                $('.msg').fadeOut();
            });
        });
    </script>
</body>

</html>