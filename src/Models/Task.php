<?php

namespace MVC\Models;

use MVC\Core\Model;

class Task extends TaskResourceModel
{
    public function create($model)
    {
        $this->save($model);
    }

    public function showTask($id)
    {
        $this->get($id);
    }

    public function showAllTasks()
    {
        echo "sadadasd";
//      $this->getAll();
//        $sql = "SELECT * FROM tasks";
//        $req = Database::getBdd()->prepare($sql);
//        $req->execute();
//        return $req->fetchAll();
    }

    public function edit($model)
    {
        $this->save($model);
    }

    public function delete($id)
    {
        $this->delete($id);
    }
}

?>