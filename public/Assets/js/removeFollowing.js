function removeFollowingList(followID) {
    $('.msg').removeClass('success');
    $('.msg li').html("");
    if (confirm("are you sure?")) {
        $.ajax({
            type: 'POST',
            url: "../following/removeFollowing.php",
            data: {
                followID: followID,
            },
            success: function (res) {
                $('.msg').addClass('success');
                $('.msg li').html("Removed to your following successfully!!");
                $('#follow' + followID).fadeOut('slow');
            }
        });
    }
}