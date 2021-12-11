$(document).ready(function () {

    var artistID = $('.artistID').val();
    var userID = $('.userID').val();

    $('.followBtn').click(function (e) {
        $('.msg').removeClass('success');
        $('.msg li').html("");
        var data = {
            artistID: artistID,
            userID: userID,
            add_following: true
        }

        $.ajax({
            type: "POST",
            url: "following/addFollowing.php",
            data: data,
            success: function (res) {
                $('.msg').addClass('success');
                $('.msg li').html("Added to your following list successfully!");
                $('.followBtn').remove();
                $('.title-and-button').append('<button name="unSaveBtn" class="unSaveBtn" >Followed already</button>');
                setTimeout(function () {
                    window.location.reload();
                }, 1500);
            }
        });
    });

    $('.unSaveBtn').click(function (e) {
        $('.msg').removeClass('success');
        $('.msg li').html("");
        var followID = $('.followID').val();
        var data = {
            followID: followID,
            remove_following: true
        }

        $.ajax({
            type: "POST",
            url: "following/addfollowing.php",
            data: data,
            success: function (res) {
                $('.msg').addClass('success');
                $('.msg li').html("Removed from your following list successfully!");
                $('.unSaveBtn').remove();
                $('.title-and-button').append('<button name="followBtn" class="followBtn" >Follow</button>');
                setTimeout(function () {
                    window.location.reload();
                }, 1500)
            }
        });
    })
});