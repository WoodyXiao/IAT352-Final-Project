$(document).ready(function () {

    var artID = $('.artID').val();
    var userID = $('.userID').val();

    $('.favBtn').click(function (e) {
        $('.msg').removeClass('success');
        $('.msg li').html("");
        var data = {
            artID: artID,
            userID: userID,
            add_favourite: true
        }

        $.ajax({
            type: "POST",
            url: "public/favourite/addFavourite.php",
            data: data,
            success: function (res) {
                $('.msg').addClass('success');
                $('.msg li').html("Added to your favourite successfully!!");
                $('.favBtn').remove();
                $('.title-and-button').append('<button name="unSaveBtn" class="unSaveBtn" >Saved already</button>');
                setTimeout(function(){
                    window.location.reload();
                },1500)
            }
        });
    });

    $('.unSaveBtn').click(function (e) {
        $('.msg').removeClass('success');
        $('.msg li').html("");
        var favID = $('.favID').val();
        var data = {
            favID: favID,
            remove_favourite: true
        }
        $.ajax({
            type: "POST",
            url: "public/favourite/addFavourite.php",
            data: data,
            success: function (res) {
                $('.msg').addClass('success');
                $('.msg li').html("Removed to your favourite successfully!!");
                $('.unSaveBtn').remove();
                $('.title-and-button').append('<button name="favBtn" class="favBtn" >Add to Favourites</button>');
                setTimeout(function(){
                    window.location.reload();
                },1500)

            }
        });
    });
});