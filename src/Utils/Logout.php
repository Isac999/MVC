<?php 
namespace utils;

require_once('../Models/Connect.php');
use models\connect\Connect;

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