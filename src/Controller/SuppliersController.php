<?php 
namespace src\Controller;

require_once('../Utils/switchOperation.php');
require_once('/opt/lampp/htdocs/MVC/Autoload.php');

use Exception;
use src\Models\Suppliers;
use function src\Utils\switchOperation;

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