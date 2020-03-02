<?php
use App\models\PostData;
use App\db\components\QueryBuilder;
$title="Добавление поста";
require_once __DIR__."/../parts/header.php";
?>
    <h2 >Добавляем пост...</h2>
<?php
$btnText="Добавить";
require_once __DIR__."/../parts/form.php";
require_once __DIR__."/../parts/footer.php";
