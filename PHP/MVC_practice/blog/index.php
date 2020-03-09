<?php
    require("./controller/controller.php");
    if (isset($_REQUEST['action'])) {
        $action = $_REQUEST['action'];
        if ($action == 'listPosts') {
            listPosts();
        } elseif ($action == 'post') {
            if (isset($_GET['article']) && $_GET['article'] > 0) {
                post($_GET['article']);
            } else {
                echo 'Error: no ID for article requested!';
            }
        } elseif ($action == 'postComment') {
            if (isset($_POST['name']) AND isset($_POST['comment']) AND $_POST['name'] !== '' AND $_POST['comment'] !== '') {
                listNewComments($_POST['id_article'], $_POST['name'], $_POST['comment']);
            } else {
                echo 'Error: invalid comment!';
            }
        }
    } else {
        listPosts();
    }

