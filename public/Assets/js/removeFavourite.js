function removeFavouritesList(favID) {
    $('.msg').removeClass('success');
    $('.msg li').html("");
    if (confirm("Are you sure you want to remove this artwork?")) {
        $.ajax({
            type: 'POST',
            url: "../favourite/removeFavourite.php",
            data: {
                favID: favID,
            },
            success: function (res) {
                $('.msg').addClass('success');
                $('.msg li').html("Artwork is removed from your favorites");
                $('#fav' + favID).fadeOut('slow');
            }
        });
    }
}

