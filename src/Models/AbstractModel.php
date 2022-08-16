<?php 
namespace src\Models;

//require_once('../Models/Connect.php');
include_once('../../Autoload.php');
use src\Models\Connect;

abstract class AbstractModel extends Connect {

    public function __construct($database) {
        parent::__construct($database);
    }
    
    abstract public function insert($data);
    abstract public function update($data);
    abstract public function delete($data);
}
?>