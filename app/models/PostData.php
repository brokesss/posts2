<?php

namespace App\models;

use App\db\components\QueryBuilder;

class PostData
{
    protected $db;

    public function __construct(QueryBuilder $db)
    {
        $this->db = $db;
    }

    public function getAllPosts()
    {
        $posts = $this->db->getAll("posts", "datePublication");
        require_once __DIR__ . "/../views/posts/index.view.php";
    }

    public function getOne($id)
    {
        return $this->db->getOne("posts",$id);
    }

    public function store($data)
    {
        $temp["datePublication"]=date("Y-m-d");
        $temp["title"] = $data["title"];
        $temp["description"] = $data["description"];
        $temp["photo"] = $data["photo"];
      $temp["id_user"] = rand(1,2);
        $this->db->store("posts",$temp);
    }

    public function delete($id)
    {
        $this->db->delete("posts",$id);
    }

    public function update($data)
    {
        $temp["title"] = $data["title"];
        $temp["description"] = $data["description"];
        $temp["photo"] = $data["photo"];
        $this->db->update("posts",$temp);
    }
}