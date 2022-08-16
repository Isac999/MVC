<?php 
namespace controller;

require_once('../Models/Suppliers.php');
require_once('../Utils/switchOperation.php');

use Exception;
use models\crud\Suppliers;
use function utils\switchOperation;

class SuppliersController {

    public function __construct($json) {

        $list = explode(',"operation":', $json);
        $operation = str_replace(['}', '"'], '', $list[1]);
        $json = str_replace(['{', ':', 'id', '"'], '', $list[0]);

        try {
            $connect = new Suppliers('library');
            switchOperation($operation, $json, $connect);
            return true;
        } catch (Exception $e) {
            echo $e;
            return false;
        }
    }
}
$json = file_get_contents('php://input');
$conn = new SuppliersController($json);
?>