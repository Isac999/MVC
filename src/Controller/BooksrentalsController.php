<?php 
namespace src\Controller;

require_once('../Utils/switchOperation.php');
require_once('/opt/lampp/htdocs/MVC/Autoload.php');

use Exception;
use src\Models\Books_rentals;
use function src\Utils\switchOperation;

class Books_rentalsController {

    public function __construct($json) {

        $list = explode(',"operation":', $json);
        $operation = str_replace(['}', '"'], '', $list[1]);
        $json = str_replace(['{', ':', 'id', '"'], '', $list[0]);
        
        try {
            $connect = new Books_rentals('library');
            switchOperation($operation, $json, $connect);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
$json = file_get_contents('php://input');
$conn = new Books_rentalsController($json);
?>
