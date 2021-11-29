function removeFavouritesList(favID) {
    $('.msg').removeClass('success');
    $('.msg li').html("");
    if (confirm("are you sure?")) {
        $.ajax({
            type: 'POST',
            url: "../favourite/removeFavourite.php",
            data: {
                favID: favID,
            },
            success: function (res) {
                $('.msg').addClass('success');
                $('.msg li').html("Removed to your favourite successfully!!");
                $('#fav' + favID).fadeOut('slow');
            }
        });
    }
}

