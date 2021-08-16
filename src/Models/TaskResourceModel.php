<?php

namespace MVC\Models;

use MVC\Core\ResourceModel;

class TaskResourceModel extends ResourceModel
{
    public function __construct(){
        _init("tasks","id",new Task);
    }
}