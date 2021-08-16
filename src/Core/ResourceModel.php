<?php

namespace MVC\Core;

class ResourceModel extends Model implements ResourceModelInterface
{

    private $table;
    private $id;
    private $model;

    public function _init($table, $id, $model)
    {
        $this->table = $table; //tasks
        $this->id = $id; //
        $this->model = $model; //Task
    }

    public function save($model)
    {
        $arrayModel = $this->getProperties($model);
        $id = $arrayModel[$this->id];
        $stringModel = null;
        foreach ($arrayModel as $key => $value){
            $stringModel.="{$key} = :{$value}, ";
        }
        if ($arrayModel['$this->id'] == null) {
            $sql = "INSERT INTO $this->table SET $stringModel";
        } else {
            $sql = "UPDATE $this->table SET $stringModel WHERE $this->id = $id";
        }
        $req = Database::getBdd()->prepare($sql);
        return $req->execute($arrayModel);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM $this->table WHERE $this->id=$id";
        $req = Database::getBdd()->prepare($sql);
        return $req->execute();
    }

    public function get($id)
    {
        $sql = "SELECT * FROM $this->table WHERE $this->id = $id";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return ($req->fetchObject(get_class($this->model)));
    }

    public function getAll()
    {
        $sql = "SELECT * FROM $this->table";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchALl();
//        return ($req->fetchAll(PDO::FETCH_CLASS, get_class($this->model)));

    }
}
