<?php
use App\models\PostData;
use App\db\components\QueryBuilder;
$postData = new PostData(new QueryBuilder());
if(!isset($_GET['id'])||empty($_GET['id'])){
    exit;

}
$post=$postData->getOne($_GET['id']);


if(count($_POST)>0){
    $_POST["id"]=$_GET['id'];
    $id=$postData->update($_POST);
    header("Location: /");
    exit;
}


require_once "App/views/posts/updatePost.view.php";
