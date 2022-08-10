<?php 
namespace controller;

require_once('../Models/Books.php');
use models\crud\Books;

class BooksController {

    public function __construct($json) {

        $list = explode(',"operation":', $json);
        $json = str_replace('{', '', $list[0]);
        $operation = str_replace(['}', '"'], '', $list[1]);
        
        $connect = new Books('library');
        //$connect->update($json);
        //$connect->insert($json);
        //$connect->delete($json);
    }

}

$json = file_get_contents('php://input');
$conn = new BooksController($json);

?>