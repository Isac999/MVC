<?php 
namespace models\crud;

require_once('../Models/AbstractModel.php');
use models\crud\AbstractModel;

class Books extends AbstractModel {

    public function insert($json) : bool
    {
        $data = $json;
        $data = str_replace([":", "table", "}", "{"], "", $data);

        $list = explode("arrayValues", $data);
        $table_name = str_replace(['"', ','], "", $list[0]);
        $listData = str_replace(['"', '[', ']'], "", $list[1]);
        $listData = explode(',', $listData);

        echo $table_name;
        print_r($listData);

        $exec = "INSERT INTO `books` (`id`, `name`, `genre`, `author`, `library_id`) VALUES ('$listData[0]', '$listData[1]', '$listData[2]', '$listData[3]', '$listData[4]')";
        $query = $this->mysqli->query($exec) or die('Falha ao executar inserção!');
        return true;
    }

    public function update($data) {

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