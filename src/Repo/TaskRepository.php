<?php
namespace MVC\Repo;
use MVC\Models\TaskResourceModel;
class TaskRepository extends TaskResourceModel{
    public function create($title, $description)
    {
        $task=[
            "title"=>$title,
            "description"=>$description];
//        var_dump($task);
$this->save($task);
        return  header("Location: " . WEBROOT . "");
    }

    public function showTask($id)
    {
       return $this->get($id);
    }

    public function showAllTasks()
    {
return $this->getAll();
    }

    public function edit($id, $title, $description)
    {
        $task=[
            "id"=>$id,
            "title"=>$title,
            "description"=>$description];
//        var_dump($task);
        $this->save($task);
        return  header("Location: " . WEBROOT . "");
    }

    public function delete($id)
    {
        $this->remove($id);
        return  header("Location: " . WEBROOT . "");

    }

}