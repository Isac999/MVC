<?php 
use src\Models\Connect;
require_once('../../Autoload.php');
//require_once('../Models/Connect.php');

class Teste extends Connect {
    public function test() {
        echo "funcionou";
    }
}
$c = new Teste('library');
$c->test();