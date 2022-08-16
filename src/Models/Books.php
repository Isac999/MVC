<?php 
namespace src\Models;

require_once('/opt/lampp/htdocs/MVC/Autoload.php');
use src\Models\AbstractModel;

class Books extends AbstractModel {
    
    public function __construct($database) {
        parent::__construct($database);
    }

    public function insert($listData) : bool
    {
        $exec = "INSERT INTO `books` (`id`, `name`, `genre`, `author`, `library_id`) VALUES ('$listData[0]', '$listData[1]', '$listData[2]', '$listData[3]', '$listData[4]')";
        $query = $this->mysqli->query($exec) or die('Falha ao executar inserção!');
        return true;
    }

    public function update($listData) : bool
    {
        $columns = array();
        $exec_columns = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'library' AND TABLE_NAME = 'books'";
        $selectColumns = $this->mysqli->query($exec_columns) or die('Erro ao consultar colunas');
        
        while ($column = $selectColumns->fetch_assoc()) {
            array_push($columns, $column['COLUMN_NAME']);
        }

        for ($index = 0; $index != count($columns); $index++) {
            $exec = "UPDATE `books` SET `$columns[$index]` = '$listData[$index]' WHERE `books`.`id` = '$listData[0]'";
            $query = $this->mysqli->query($exec) or die('Falha ao executar update!');
        }
        return true;
    }

    public function delete($json) : bool
    {
        $data = $json;
        $exec = "DELETE FROM `books` WHERE id = '$data'";
        $query = $this->mysqli->query($exec) or die("Falha na deleção");
        return true;
    }
}
?>