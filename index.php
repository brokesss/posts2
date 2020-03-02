<?php
require_once __DIR__ . "/vendor/autoload.php";
$route = $_GET['route'];
switch ($route) {
    case '':
        require_once 'app/db/posts/index.php';
        break;

    case 'insertpost':
        require_once 'app/db/posts/insertPost.php';
        break;

    case 'deletepost':
        require_once 'app/db/posts/deletePost.php';
        break;

    case 'updatepost':
        require_once 'app/db/posts/updatePost.php';
        break;
}
