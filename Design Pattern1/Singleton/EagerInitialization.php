<?php
class Connection
{

    private function __construct()
    {
        echo "New object created";
    }
    public static function getInstance()
    {
        
        if(self ::$instance == null)
        {
           self::$instance = new static();
        }
        else{
           // echo self ::$instance;
            return self ::$instance;
        }
    }
}
$object = Connection :: getInstance();
echo $object;
$object = Connection :: getInstance();
$object = Connection :: getInstance();
?>
