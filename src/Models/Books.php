<?php 
namespace models\crud;

require_once('../Models/AbstractModel.php');
use models\crud\AbstractModel;

class Books extends AbstractModel {
    
    public function __construct() {

    }

    public function insert($json) : bool
    {
        $data = $json;
        $data = str_replace([":", "}", "{"], "", $data);
        
        $list = explode("arrayValues", $data);
        $listData = str_replace(['"', '[', ']'], "", $list[1]);
        $listData = explode(',', $listData);

        print_r($listData);

        $exec = "INSERT INTO `books` (`id`, `name`, `genre`, `author`, `library_id`) VALUES ('$listData[0]', '$listData[1]', '$listData[2]', '$listData[3]', '$listData[4]')";
        $query = $this->mysqli->query($exec) or die('Falha ao executar inserção!');
        return true;
    }

    public function update($json) : bool
    {
        $data = $json;
        $data = str_replace([":", "}", "{"], "", $data);

        $list = explode("arrayValues", $data);
        $listData = str_replace(['"', '[', ']'], "", $list[1]);
        $listData = explode(',', $listData);

        print_r($listData);
        
        $columns = array();
        $exec_columns = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'library' AND TABLE_NAME = 'books'";
        $selectColumns = $this->mysqli->query($exec_columns) or die('Erro ao consultar colunas');
        
        while ($column = $selectColumns->fetch_assoc()) {
            array_push($columns, $column['COLUMN_NAME']);
        }

        print_r($columns);

        for ($index = 0; $index != count($columns); $index++) {
            $exec = "UPDATE `books` SET `$columns[$index]` = '$listData[$index]' WHERE `books`.`id` = '$listData[0]'";
            $query = $this->mysqli->query($exec) or die('Falha ao executar update!');
        }
        return true;
    }

    public function delete($json) : bool
    {
        $data = $json;
        $data = str_replace(['{', '}', '"', ':', 'id'], "", $data);

        print_r($data);

        $exec = "DELETE FROM `books` WHERE id = '$data'";
        $query = $this->mysqli->query($exec) or die("Falha na deleção");
        return true;
    }
}
?>