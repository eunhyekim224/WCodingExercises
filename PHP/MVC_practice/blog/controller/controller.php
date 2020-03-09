<?php
    require("./model/model.php");

    function listPosts() {
        $articles = getPosts();
        require("./view/listPostsView.php");
    }

    function post($postId) {
        $post = getPost($postId);
        $comments = getComments($postId);
        require("./view/postView.php");
    }

    // function listNewComments($postId, $commentName, $comment) {
    //     addComment($postId, $commentName, $comment);
    //     header('Location:index.php?action=post&article='.$postId);
    // }

    function listNewComments($postId, $commentName, $comment) {
        $status = addComment($postId, $commentName, $comment);
        header('Location:index.php?action=post&article='.$postId.'&status='.$status);
    }