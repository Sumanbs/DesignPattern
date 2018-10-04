<?php
class Connection
{
    /**
     * @var instance - stores the class object
     */
    private static $instance = null;
    /**
     * Constructor
     */
    private function __construct()
    {
        echo "New object created";
    }
    /**
     * @getInstance - creates the new object one time.
     */
    public static function getInstance()
    {
        /**
         * if instance is null creates new object.
         */
        if (self::$instance == null) {
            self::$instance = new Connection();
        } else {
            /**
             * returns already created object object.
             */
            echo "\nObject already created";
            return self::$instance;
        }
    }
}
$object = Connection::getInstance();
$object = Connection::getInstance();
$object = Connection::getInstance();
