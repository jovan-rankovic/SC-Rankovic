$(document).ready(function () {
    $("#commentBtn").on("click", comment_store);
    $(document).on("click", "#training_pagination .pagination a", training_pagination);
    $(document).on("click", "#post_pagination .pagination a", post_pagination);
});


function comment_store(e) {
    e.preventDefault();

    let commentMsg = $("#commentMsg").val();
    let postId = $("#postId").val();
    let loggedUserId = $("#loggedUserId").val();
    let postTitle = $("#postTitle").val();
    let loggedUserFN = $("#loggedUserFN").val();
    let loggedUserLN = $("#loggedUserLN").val();

    let reCommentMsg = /^[\wĆČŽĐŠćčžđš .,!(\?)':"-]{2,}$/;

    if(!commentMsg.match(reCommentMsg)){
        $(".blog-comment-form").prepend("<div class='alert alert-warning alert-dismissable' role='alert'>Bad message format.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>");
    }
    else{
        $.ajax({
            type: "post",
            url: BASE_URL + "/posts/"+postId+"/comments",
            data: {
                content: commentMsg,
                post_id : postId,
                user_id : loggedUserId,
                postTitle : postTitle,
                userFN : loggedUserFN,
                userLN : loggedUserLN,
                _token : TOKEN
            },
            success: function () {
                location.reload();
            },
            error: function (xhr) {
                $(".blog-comment-form").prepend("<div class='alert alert-warning alert-dismissable' role='alert'>"+xhr.status + ': ' + xhr.statusText+"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>");
            }
        });
    }
}


function comment_delete(post_id, comment_id, user_id, commentContent, userFN, userLN, postTitle) {
    $.ajax({
        type: "delete",
        url: BASE_URL + "/posts/"+post_id+"/comments/"+comment_id,
        data: {
            post_id : post_id,
            id : comment_id,
            user_id : user_id,
            commentContent : commentContent,
            userFN : userFN,
            userLN : userLN,
            postTitle : postTitle,
            _token : TOKEN
        },
        success: function () {
            location.reload();
        },
        error: function (xhr) {
            $(".blog-comment-form").prepend("<div class='alert alert-warning alert-dismissable' role='alert'>"+xhr.status + ': ' + xhr.statusText+"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>");
        }
    });
}


function comment_update(post_id, comment_id, user_id, userFN, userLN, postTitle) {
    let editComment = $("#editComment").val();

    let reCommentMsg = /^[\wĆČŽĐŠćčžđš .,!(\?)':"-]{2,}$/;

    if(!editComment.match(reCommentMsg)){
        $(".blog-comment-form").prepend("<div class='alert alert-warning alert-dismissable' role='alert'>Bad message format.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>");
    }
    else{
        $.ajax({
            type: "patch",
            url: BASE_URL + "/posts/" + post_id + "/comments/" + comment_id,
            data: {
                post_id: post_id,
                id: comment_id,
                user_id: user_id,
                content: editComment,
                userFN: userFN,
                userLN: userLN,
                postTitle: postTitle,
                _token: TOKEN
            },
            success: function () {
                location.reload();
            },
            error: function (xhr) {
                $(".blog-comment-form").prepend("<div class='alert alert-warning alert-dismissable' role='alert'>" + xhr.status + ': ' + xhr.statusText + "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>");
            }
        });
    }
}


function training_pagination(e) {
    e.preventDefault();

    let pageNumber = $(this).attr("href").split("page=")[1];

    $.ajax({
        type: "get",
        url: BASE_URL + "/trainings/pagination?page=" + pageNumber,
        success: function (data) {
            $("#training_data").html(data);
        },
        error: function (xhr) {
            $("#training_data").prepend("<div class='alert alert-warning alert-dismissable' role='alert'>"+xhr.status + ': ' + xhr.statusText+"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>");
        }
    });
}


function post_pagination(e) {
    e.preventDefault();

    let pageNumber = $(this).attr("href").split("page=")[1];

    $.ajax({
        type: "get",
        url: BASE_URL + "/posts/pagination?page=" + pageNumber,
        success: function (data) {
            $("#post_data").html(data);
        },
        error: function (xhr) {
            $("#post_data").prepend("<div class='alert alert-warning alert-dismissable' role='alert'>"+xhr.status + ': ' + xhr.statusText+"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>");
        }
    });
}
