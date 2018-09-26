<?php
abstract class Computer
{
    abstract protected function getRam();
    abstract protected function getMonitor();
    abstract protected function getHDD();
    public function __toString()
    {
        return "RAM = " . $this->getRam() . ", Monitor = ". $this->getMonitor() . ", HDD = ". $this->getHDD();
    }
}
class PC  extends Computer
{
    private $RAM;
    private $Monitor;
    private  $HDD ;

    public function __construct($RAM,$Monitor,$HDD)
    {
        $this->RAM = $RAM;
        $this->Monitor = $Monitor;
        $this->HDD = $HDD;
    }
    public function getRam()
    {
        return $this->RAM;
    }
    public function getMonitor()
    {
        return $this->Monitor;
    }
    public function getHDD()
    {
        return $this->HDD;
    }
}
class Laptop  extends Computer
{
    private $RAM;
    private $Monitor;
    private  $HDD ;

    public function __construct($RAM,$Monitor,$HDD)
    {
        $this->RAM = $RAM;
        $this->Monitor = $Monitor;
        $this->HDD = $HDD;
    }
    public function getRam()
    {
        return $this->RAM;
    }
    public function getMonitor()
    {
        return $this->Monitor;
    }
    public function getHDD()
    {
        return $this->HDD;
    }
}
class Server  extends Computer
{
    private $RAM;
    private $Monitor;
    private  $HDD ;

    public function __construct($RAM,$Monitor,$HDD)
    {
        $this->RAM = $RAM;
        $this->Monitor = $Monitor;
        $this->HDD = $HDD;
    }
    public function getRam()
    {
        return $this->RAM;
    }
    public function getMonitor()
    {
        return $this->Monitor;
    }
    public function getHDD()
    {
        return $this->HDD;
    }
}
class ComputerFactory
{
    public static function getComputer($type,$RAM,$Monitor,$HDD)
    {
        if($type == "PC")
        return new PC($RAM,$Monitor,$HDD) ;
        elseif ($type =="Laptop") {
            return new Laptop($RAM,$Monitor,$HDD) ;
        }else
        return new Server($RAM,$Monitor,$HDD) ;
    }
}
    $PC  = ComputerFactory::getComputer("PC","2 GB","IBM","1TB"); 
    $Laptop  = ComputerFactory::getComputer("Laptop","12GB","HCL","1TB"); 
    $Server  = ComputerFactory::getComputer("Server","1GB","Onida","500 GB"); 
    echo "\n**********PC********\n " . $PC;
    echo "\n***********Laptop*******\n" . $Laptop;
    echo "\n**********Server********\n" . $Server;
?>