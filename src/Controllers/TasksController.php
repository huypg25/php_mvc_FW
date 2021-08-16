<?php
namespace MVC\Controllers;
use MVC\Core\Controller;
use MVC\Models\Task;
class TasksController extends Controller
{
    function index()
    {
        echo "index";
        $tasks = new Task();
//        $d['tasks'] = $tasks->showAllTasks();
//        var_dump($d);
//            $this->set($d);
//        $this->render("index");

    }

    function create()
    {

        if (isset($_POST["title"]))
        {

            $task= new Task();

            if ($task->create($_POST["title"], $_POST["description"]))
            {
                header("Location: " . WEBROOT . "");
            }
        }

        $this->render("create");
    }

    function edit($id)
    {
        $task= new Task();

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
        $task = new Task();
        if ($task->delete($id))
        {
            header("Location: " . WEBROOT . "");
        }
    }
}
?>