<?php

namespace MVC\Models;

use Doctrine\ORM\Mapping as ORM;
use MVC\Core\Model;

class TaskModel extends Model
{
    private $id;
    private $title;
    private $description;

    /**
     * @param $id
     * @param $title
     * @param $description
     */
    public function __construct(){

    }
//    public function __construct($id, $title, $description)
//    {
//        $this->id = $id;
//        $this->title = $title;
//        $this->description = $description;
//    }

    /**
     * @return null
     */
    public static function getBdd()
    {
        return self::$bdd;
    }

    /**
     * @param null $bdd
     */
    public static function setBdd($bdd): void
    {
        self::$bdd = $bdd;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }


}

?>