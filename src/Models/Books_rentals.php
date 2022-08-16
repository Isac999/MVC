<?php 
namespace src\Models;

require_once('/opt/lampp/htdocs/MVC/Autoload.php');
use src\Models\AbstractModel;

class Books_rentals extends AbstractModel {
    
    public function __construct($database) {
        parent::__construct($database);
    }

    public function insert($listData) : bool
    {
        $exec = "INSERT INTO `books_rentals` (`id`, `book_id`, `customer_id`, `date`) VALUES ('$listData[0]', '$listData[1]', '$listData[2]', '$listData[3]')";
        $query = $this->mysqli->query($exec) or die('Falha ao executar inserção!');
        return true;
    }

    public function update($listData) : bool
    {
        $columns = array();
        $exec_columns = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'library' AND TABLE_NAME = 'books_rentals'";
        $selectColumns = $this->mysqli->query($exec_columns) or die('Erro ao consultar colunas');
        
        while ($column = $selectColumns->fetch_assoc()) {
            array_push($columns, $column['COLUMN_NAME']);
        }

        for ($index = 0; $index != count($columns); $index++) {
            $exec = "UPDATE `books_rentals` SET `$columns[$index]` = '$listData[$index]' WHERE `books_rentals`.`id` = '$listData[0]'";
            $query = $this->mysqli->query($exec) or die('Falha ao executar update!');
        }
        return true;
    }

    public function delete($json) : bool
    {
        $data = $json;
        $exec = "DELETE FROM `books_rentals` WHERE id = '$data'";
        $query = $this->mysqli->query($exec) or die("Falha na deleção");
        return true;
    }
}
?>