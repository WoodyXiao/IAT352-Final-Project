function removeComment(commentID) {
    $('.msg').removeClass('success');
    $('.msg li').html("");
    if (confirm("Are you sure you want to remove this comment?")) {
        $.ajax({
            type: 'POST',
            url: "../comment/removeComment.php",
            data: {
                commentID: commentID,
            },
            success: function (res) {
                $('.msg').addClass('success');
                $('.msg li').html("Your comment has been removed");
                $('#cmt' + commentID).fadeOut('slow');
            }
        });
    }
}