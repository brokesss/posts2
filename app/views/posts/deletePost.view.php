
<?php
$title="Удаление поста";
require_once __DIR__."/../parts/header.php";
?>
<h2 style="color: white">Удаление поста...</h2>
<form method="post" action="">
    <table class="table table-striped table-bordered table-hover table-dark col-12">
        <tr class="d-flex">
            <td class="col-1 text-center">#</td>
            <td class="col-2 text-center">Название</td>
            <td class="col-2 text-center">Описание</td>
            <td class="col-1 text-center">Фото</td>
            <td class="col-2 text-center">Дата публикации</td>
            <td class="col-4 text-center"></td>
        </tr>
        <tr class="d-flex">

            <td class="col-md-2"><?= $post->title ?></td>
            <td class="col-md-2"><?= nl2br($post->description)  ?></td>
            <td class="col-md-1"><?= $post->photo  ?></td>
            <td class="col-md-2"><?= date_format(new DateTime($post->datePublication),'d : m : y') ?></td>
            <td class="col-4 p-2 text-center">
                <button type="submit" class="btn btn-danger" name="btnDel">Удалить</button>
            </td>
        </tr>
    </table>
</form>
<div class="container">
    <a class="col-mb-4 btn btn-primary mt-5 mb-3 p-3" href="index.php">
        Назад
    </a>
</div>

