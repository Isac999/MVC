<?php 
namespace controller;

require_once('../Models/Libraries.php');
require_once('../Utils/switchOperation.php');

use Exception;
use models\crud\Libraries;
use function utils\switchOperation;

class LibrariesController {

    public function __construct($json) {

        $list = explode(',"operation":', $json);
        $operation = str_replace(['}', '"'], '', $list[1]);
        $json = str_replace(['{', ':', 'id', '"'], '', $list[0]);
        
        try {
            $connect = new Libraries('library');
            switchOperation($operation, $json, $connect);
            return true;
        } catch (Exception $e) {
            echo $e;
            return false;
        }
    }
}
$json = file_get_contents('php://input');
$conn = new LibrariesController($json);
?>