<?php

class Model
{
    protected PDO $connection;
    protected $tableName;
    protected $joinTable;

    public function __construct()
    {
        $this->connection = new PDO("mysql:host=localhost;dbname=cabinet-dentiste", "root", "");
    }

    public function fetchAll($filter = "", $data = [])
    {

        return $this->fetchAllWithColumnRename($filter, "*", $data);
    }

    public function fetchAllWithJoin($filter = "", $joinCode = "", $data = [])
    {
        $statment = $this->connection->prepare("select * from $this->tableName $joinCode $filter");
        $statment->execute($data);
        return $statment->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $keys = array_keys($data); // ["username", "password"]

        $columns = implode(",", $keys); // username,password

        $modifiedKeys = array_map(function ($key) { // [":username",":password"]
            return ":$key";
        }, $keys);

        $placeholders = implode(",", $modifiedKeys); // :username,:password
        $statment = $this->connection->prepare("insert into $this->tableName  ($columns) values ($placeholders)");
        return  $statment->execute($data) ? $this->lastInsertedId() : false; // terinary operator
    }

    private function lastInsertedId()
    {
        return $this->connection->lastInsertId();
    }

    public function update($data, $mainColumn = "id", $val)
    {
        $updatedColumns = array_map(function ($key) {
            return "$key=:$key";
        }, array_keys($data));
        $updatedColumns = implode(", ", $updatedColumns);
        $statement = $this->connection->prepare("UPDATE $this->tableName SET $updatedColumns WHERE $mainColumn=:$mainColumn");
        return $statement->execute([...$data, $mainColumn => $val]);
    }
    public function updateById($id, $data)
    {
        return $this->update($data, "id", $id);
    }


    public function fetchAllWithColumnRename($filter = "", $columns = "*", $data = [])
    {
        $statment = $this->connection->prepare("select $columns from $this->tableName  $filter");
        $statment->execute($data);
        return $statment->fetchAll(PDO::FETCH_ASSOC);
    }



    public function delete($filter, $data = [])
    {
        $statement = $this->connection->prepare("DELETE FROM $this->tableName $filter ");
        return $statement->execute($data);
    }

    public function deleteById($id)
    {
        return $this->delete("where id = :id", ["id" => $id]);
    }


    public function fetchByReference($reference)
    {
        return $this->fetchOne("where reference =:ref", ["ref" => $reference]);
    }


    public function fetchOne($filtre = "", $data = [])
    {
        $statment = $this->connection->prepare("select * from $this->tableName $filtre");
        $statment->execute($data);
        return $statment->fetch(PDO::FETCH_ASSOC);
    }

    public function fetchById($id)
    {
        return $this->fetchOne("where id =:id", ["id" => $id]);
    }
}
