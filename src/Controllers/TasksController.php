<?php
namespace MVC\Controllers;
use MVC\Core\Controller;
use MVC\Models\TaskModel;
use MVC\Repo\TaskRepository;
class TasksController extends Controller
{

    function index()
    {

$tasks= new TaskRepository();
//var_dump($tasks->getAll());
        $d['tasks'] = $tasks->showAllTasks();
            $this->set($d);
        $this->render("index");

    }

    function create()
    {

        if (isset($_POST["title"]))
        {

            $task= new TaskRepository();

            if ($task->create($_POST["title"], $_POST["description"]))
            {
                header("Location: " . WEBROOT . "");
            }
        }

        $this->render("create");
    }

    function edit($id)
    {
        $task= new TaskRepository();
        $d["task"] = $task->showTask($id);

        if (isset($_POST["title"]))
        {
            if ($task->edit($id, $_POST["title"], $_POST["description"]))
            {
                header("Location: " . WEBROOT . "");
            }
        }
        $this->set($d);
        $this->render("edit");
    }

    function delete($id)
    {
        $task= new TaskRepository();
        if ($task->delete($id))
        {
            header("Location: " . WEBROOT . "");
        }
    }
}
?>