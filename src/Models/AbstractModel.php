<?php 
namespace models\crud;

include_once('./src/Models/Connect.php');
use models\connect\Connect;

abstract class AbstractModel extends Connect {

    abstract public function tranformData();
    abstract public function insert();
    abstract public function update();
    abstract public function delete();
}
?>