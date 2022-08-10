<?php 
namespace controller;

require_once('../Models/Books.php');
use models\crud\Books;

class BooksController {

    public function __construct($json) {
        $connect = new Books('library');
        $connect->update($json);
        //$connect->insert($json);
        //$connect->delete($json);
    }

}

$json = file_get_contents('php://input');
$conn = new BooksController($json);
?>