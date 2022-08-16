<?php 
namespace src\Utils;

//require_once('../Models/Connect.php');
require_once('../../Autoload.php');
use src\Models\Connect;

class Logout extends Connect {

    public static function logout() : void
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        
        session_destroy();
        header("Location: ../../login");
    }

}

Logout::logout();
?>