<?php
/**
 * @Description - ​ Factory Pattern to create a Computer Factory
 * that can Produce PC, Laptop and Server Class Computers.
 */
abstract class Computer
{
    abstract protected function getRam();
    abstract protected function getMonitor();
    abstract protected function getHDD();
    /**
     * Overrriding toString method to print the object reference,
     */
    public function __toString()
    {
        return "RAM = " . $this->getRam() . ", Monitor = " . $this->getMonitor() . ", HDD = " . $this->getHDD();
    }
}
/**
 * @PC extends Computer and provides implementation for all abstract methods.
 */
class PC extends Computer
{
    private $RAM;
    private $Monitor;
    private $HDD;
    /**
     * Constructor - Initialises RAM,monitor,HDD
     */
    public function __construct($RAM, $Monitor, $HDD)
    {
        $this->RAM     = $RAM;
        $this->Monitor = $Monitor;
        $this->HDD     = $HDD;
    }
    /**
     * @getRam
     * @return string
     */
    public function getRam()
    {
        return $this->RAM;
    }
    /**
     * @getMonitor
     * @return string
     */
    public function getMonitor()
    {
        return $this->Monitor;
    }
    /**
     * @getHDD
     * @return string
     */
    public function getHDD()
    {
        return $this->HDD;
    }
}
/**
 * @Laptop extends Computer and provides implementation for all abstract methods.
 */
class Laptop extends Computer
{
    private $RAM;
    private $Monitor;
    private $HDD;

    /**
     * Constructor - Initialises RAM,monitor,HDD
     */
    public function __construct($RAM, $Monitor, $HDD)
    {
        $this->RAM     = $RAM;
        $this->Monitor = $Monitor;
        $this->HDD     = $HDD;
    }
    /**
     * @getRam
     * @return string
     */
    public function getRam()
    {
        return $this->RAM;
    }
    /**
     * @getMonitor
     * @return string
     */
    public function getMonitor()
    {
        return $this->Monitor;
    }
    /**
     * @getHDD
     * @return string
     */
    public function getHDD()
    {
        return $this->HDD;
    }
}
/**
 * @Server extends Computer and provides implementation for all abstract methods.
 */
class Server extends Computer
{
    private $RAM;
    private $Monitor;
    private $HDD;

    public function __construct($RAM, $Monitor, $HDD)
    {
        $this->RAM     = $RAM;
        $this->Monitor = $Monitor;
        $this->HDD     = $HDD;
    }
    /**
     * @getRam
     * @return string
     */
    public function getRam()
    {
        return $this->RAM;
    }
    /**
     * @getMonitor
     * @return string
     */
    public function getMonitor()
    {
        return $this->Monitor;
    }
    /**
     * @getHDD
     * @return string
     */
    public function getHDD()
    {
        return $this->HDD;
    }
}
/**
 * Computer factory creates the objects for required class.
 */
class ComputerFactory
{
    /**
     * @getComputer - Returns the object
     */
    public static function getComputer($type, $RAM, $Monitor, $HDD)
    {
        if ($type == "PC") {
            return new PC($RAM, $Monitor, $HDD);
        } elseif ($type == "Laptop") {
            return new Laptop($RAM, $Monitor, $HDD);
        } else {
            return new Server($RAM, $Monitor, $HDD);
        }
        echo "\n";

    }
    /**
     * User implementation.
     */
    public function menu()
    {
        echo "\n Do you want Laptop,PC or Server ? : ";
        $name = readline();
        echo "\nEnter the RAM configuration(2GB,4GB,8GB) --";
        $ram = readline();
        echo "\nEnter the Monitor :";
        $monitor = readline();
        echo "\nEnter the HDD configuration : ";
        $HDD   = readline();
        $name1 = ComputerFactory::getComputer($name, $ram, $monitor, $HDD);
        echo "\n Your computer configuration is : ";
        echo $name1 . "\n";

    }
}
$ref = new ComputerFactory();
$ref->menu();
