<?php

use App\db\components\QueryBuilder;
use App\models\PostData;

$postData = new PostData(new QueryBuilder());
if (count($_POST) > 0) {
    $_POST["datePublication"] = date("Y-m-d");
    //работа с фото

    $fileName = $_FILES['photo']['name'];
    $fileTemp = $_FILES['photo']['tmp_name'];
    $fileType = $_FILES['photo']['type'];
    $fileSize = $_FILES['photo']['size'];
    $fileError = $_FILES['photo']['error'];

    $fileExt = strtolower(end(explode('.', $fileName)));


    $fileName = explode('.', $fileName)[0];

    $extentions = ['jpg', 'jpeg', 'png'];
    if (in_array($fileExt, $extentions)) {

        if ($fileSize < 5000000) {

            if ($fileError === 0) {
                $_POST['photo'] = implode('.', [$fileName, $fileExt]);
            }
        }
    } else {
        $_POST['photo'] = "default.jpg";
    }
    $id = $postData->store($_POST);
    if ($id != null) {
        $fileDestination = "uploads/" . $_POST['photo'];
        move_uploaded_file($fileTemp, $fileDestination);
    }
    header("Location: /");
    exit;
}
require_once "App/views/posts/insertPost.view.php";
