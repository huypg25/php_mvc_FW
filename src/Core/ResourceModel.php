<?php

namespace MVC\Core;


use MVC\Config\Database;

class ResourceModel extends Model implements ResourceModelInterface
{

    private  $table;
    private $id;
    private $model;

    public function _init($table, $id, $model)
    {
        $this->table = $table;
        $this->id = $id;
        $this->model = $model;
    }

    public function save($model)
    {

        $id = $model[$this->id];

        $stringModel = null;
        foreach ($model as $key => $value){
            if($key=="id"){
                $stringModel.="{$key} = {$value},";

            }else{
            $stringModel.="{$key} = '{$value}',";}
        }
        $stringModel = substr($stringModel, 0, -1);

//        INSERT INTO tasks SET title = 'sadasd', description = 'asdasd99999';


        if ($model[$this->id] == null) {
            $sql = "INSERT INTO $this->table SET $stringModel";
            var_dump($sql);
        } else {
            $sql = "UPDATE $this->table SET $stringModel WHERE $this->id = $id";
            var_dump($sql);
        }
//        var_dump($sql);
        $req = Database::getBdd()->prepare($sql);
        return $req->execute();
    }

    public function remove($id)
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
//        echo '<pre>' . var_export( $req->fetchObject(get_class($this->model)), true) . '</pre>';
//        return $req->fetchALl();

        return $req->fetchObject(get_class($this->model));

        //        return ($req->fetchObject(get_class($this->model)));

    }

    public function getAll()
    {
        $sql = "SELECT * FROM $this->table";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
//           var_dump($req);
        return $req->fetchALl();
//        return ($req->fetchAll(PDO::FETCH_CLASS, get_class($this->model)));

    }
}
