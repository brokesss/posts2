<?php
use App\db\components\QueryBuilder;
use App\models\PostData;
$postData = new PostData(new QueryBuilder());


if (!isset($_GET['id']) || empty($_GET['id'])) {
    exit;
}

$post = $postData->getOne($_GET["id"]);

if (isset($_POST['btnDel'])) {
    if (file_exists('uploads/' . $post->photo)) {
        if ($post->photo != 'default.jpg') {
            unlink('uploads/' . $post->photo);
        }
      $postData->delete($_GET['id']);
    }
    header("Location: /");
    exit;

}

require_once "App/views/posts/deletePost.view.php";
