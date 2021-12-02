function removeComment(commentID) {
    $('.msg').removeClass('success');
    $('.msg li').html("");
    if (confirm("are you sure?")) {
        $.ajax({
            type: 'POST',
            url: "../comment/removeComment.php",
            data: {
                commentID: commentID,
            },
            success: function (res) {
                $('.msg').addClass('success');
                $('.msg li').html("Removed your comment successfully!!");
                $('#cmt' + commentID).fadeOut('slow');
            }
        });
    }
}