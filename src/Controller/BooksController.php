<?php 
namespace controller;

require_once('../Models/Books.php');
use models\crud\Books;

class BooksController {

    public function __construct($json) {

        $list = explode(',"operation":', $json);
        $operation = str_replace(['}', '"'], '', $list[1]);
        $json = str_replace(['{', ':', 'id', '"'], '', $list[0]);

        $connect = new Books('library');

        switch($operation) {
            case "insert":
                $data = $json;
                $list = explode("arrayValues", $data);
                $listData = str_replace(['"', '[', ']'], "", $list[1]);
                $listData = explode(',', $listData);

                print_r($listData);

                $connect->insert($listData);
                break;
            case "update":
                $data = $json;
                $list = explode("arrayValues", $data);
                $listData = str_replace(['"', '[', ']'], "", $list[1]);
                $listData = explode(',', $listData);
        
                print_r($listData);
        
                $connect->update($listData);
                break;
            case "delete":
                print_r($json);
                
                $connect->delete($json);
                break;
        }
    }
}

$json = file_get_contents('php://input');
$conn = new BooksController($json);
?>