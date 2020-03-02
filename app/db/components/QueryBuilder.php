<?php

namespace App\db\components;

class QueryBuilder
{
    public $pdo;

    public function __construct()
    {
        $config = require_once __DIR__ . "/../../../config.php";
        $this->pdo = Connection::make($config);
    }

    public function getAll($table, $order = "")
    {
        $sql = "SELECT * FROM $table ORDER BY :order";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            "order" => $order
        ]);
        $results = $stmt->fetchAll();
        return $results;
    }

    public function getOne($table, $id)
    {
        $sql = "SELECT * FROM $table WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(["id" => $id]);
        return $stmt->fetch();
    }

    public function store($table, $data)
    {
        $keys = array_keys($data);
        $fields = implode(',', $keys);
        $values = ":" . implode(', :', $keys);
        $sql = "INSERT INTO $table ($fields) VALUES ($values)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return $this->pdo->lastInsertId();
    }

    public function update($table, $data)
    {
        $fields = '';
        foreach ($data as $key => $value) {
            if ($key !== "id") {
                $fields .= $key . "=:" . $key . ",";
            }
        }
        $fields = rtrim($fields, ',');
        $sql = "UPDATE $table SET $fields WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($data);
    }

    public function delete($table,$id)
    {
        $sql="DELETE FROM $table WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(["id"=>$id]);
    }
}
