function removeFollowingList(followID) {
    $('.msg').removeClass('success');
    $('.msg li').html("");
    if (confirm("Are you sure you want to unfollow this artist?")) {
        $.ajax({
            type: 'POST',
            url: "../following/removeFollowing.php",
            data: {
                followID: followID,
            },
            success: function (res) {
                $('.msg').addClass('success');
                $('.msg li').html("Artist is removed from your following list");
                $('#follow' + followID).fadeOut('slow');
            }
        });
    }
}