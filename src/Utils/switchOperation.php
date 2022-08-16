<?php 
namespace src\Utils;

function switchOperation($operation, $json, $connect) {
    
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
?>