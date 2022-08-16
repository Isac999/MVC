<?php 
namespace controller;

require_once('../Models/Books.php');
require_once('../Utils/switchOperation.php');

use Exception;
use models\crud\Books;
use function utils\switchOperation;

class BooksController {

    public function __construct($json) {

        $list = explode(',"operation":', $json);
        $operation = str_replace(['}', '"'], '', $list[1]);
        $json = str_replace(['{', ':', 'id', '"'], '', $list[0]);

        try {
            $connect = new Books('library');
            switchOperation($operation, $json, $connect);
            return true;
        } catch (Exception $e) {
            echo $e;
            return false;
        } 
         
    }
}
$json = file_get_contents('php://input');
$conn = new BooksController($json);
?>