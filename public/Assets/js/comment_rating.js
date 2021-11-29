// for the start rating systm 
$(document).ready(function () {
    $('span.fa').mouseover(function () {
        var current = $(this);
        $("span.fa").each(function (index) {
            $('span.fa').removeClass("clicked");

            $(this).addClass("hover");
            if (index === current.index() - 1) {
                return false;
            }
        });
    });
    $('span.fa').mouseleave(function () {

        $('span.fa').removeClass("hover");
    });
    $('span.fa').click(function (e) {
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
            success: function (res) {
                console.log("sdsd");
                console.log(res);
                if (res.status == 1) {
                    $("#average").html("" + res.data.avgRating);
                    $("#totalRating").html("" + res.data.ratingNum);


                } else if (res.status == 2) {
                    $("#average").html("" + res.data.avgRating);
                    $("#totalRating").html("" + res.data.ratingNum);
                }
                $('span.fa').each(function () {
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
        }, function (res) {
            res = JSON.parse(res)
            console.log(res);
            if (typeof res === 'string') {
                $('.display-comment-box').html("");
                $('.display-comment-box').append('<p>' + res + '</p>');
            }
            if (typeof res != 'string') {
                count = 0;
                $('.display-comment-box').html("");
                $.each(res, function (key, value) {

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
    $('.post-btn').click(function (e) {
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
                success: function (responese) {
                    $('#comment').val("");
                    load_comment()

                }

            });
        }

    })

    // timer for close the message
    setTimeout(function () {
        $('.msg').fadeOut();
    }, 10000);

    $('.msg').mouseover(function () {
        $('.msg').fadeOut();
    });
});