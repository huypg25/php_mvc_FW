<?php

namespace MVC\Core;
use MVC\Config\Database;
class Model extends Database
{


    public function getProperties($object)
    {
     return get_object_vars($object);
    }
}

?>