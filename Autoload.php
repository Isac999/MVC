<?php 

class Autoload 
{
    public function __construct() 
    {
        spl_autoload_register( function ($class) {
            $class = str_replace('\\', '/', $class);
            $class = __DIR__ . "/" . $class;
            $class = $class . ".php";
            include($class);
        });
    }
}
new Autoload();
?>