<?php

namespace MVC\Models;

use MVC\Core\ResourceModel;
use MVC\Models\TaskModel;
class TaskResourceModel extends ResourceModel
{
    public function __construct(){
//        ini_set('memory_limit', '1024M');

        parent::_init("tasks","id",new TaskModel());
    }
}