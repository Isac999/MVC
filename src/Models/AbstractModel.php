<?php 
namespace src\Models;

include_once('/opt/lampp/htdocs/MVC/Autoload.php');
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