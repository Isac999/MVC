<?php 
namespace controller;

require_once('../Models/Requests_to_suppliers.php');
require_once('../Utils/switchOperation.php');

use models\crud\Requests_to_suppliers;
use function utils\switchOperation;

class Requests_to_suppliersController {

    public function __construct($json) {

        $list = explode(',"operation":', $json);
        $operation = str_replace(['}', '"'], '', $list[1]);
        $json = str_replace(['{', ':', 'id', '"'], '', $list[0]);

        $connect = new Requests_to_suppliers('library');
        
        switchOperation($operation, $json, $connect);
    }
}

$json = file_get_contents('php://input');
$conn = new Requests_to_suppliersController($json);
?>