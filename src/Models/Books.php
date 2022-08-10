<?php 
namespace models\crud;

require_once('../Models/AbstractModel.php');
use models\crud\AbstractModel;

class Books extends AbstractModel {
    protected string $data;

    public function insert() {

    }

    public function update() {

    }

    public function delete($json) {
        $data = $json;
        $data = str_replace(['{', '}', '"', ':', 'id'], "", $data);

        $this->data = $data;
        print_r($this->data);

        $exec = "DELETE FROM `books` WHERE id = '$this->data'";
        $query = $this->mysqli->query($exec) or die("Falha na deleção");
        return true;
    }
}
?>