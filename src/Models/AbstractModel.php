<?php 
namespace models\crud;

require_once('../Models/Connect.php');
use models\connect\Connect;

abstract class AbstractModel extends Connect {

    public function __construct($database) {
        parent::__construct($database);
    }
    
    abstract public function insert($data);
    abstract public function update($data);
    abstract public function delete($data);
}
?>