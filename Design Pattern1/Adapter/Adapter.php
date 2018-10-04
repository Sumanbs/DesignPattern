<?php
/**
 * @Volt - A class which takes voltage inputs and gives it.
 */
class Volt
{
    /**
     * @var integer
     */
    private $volts;

    public function __construct($v)
    {
        $this->volts = $v;
    }

    public function getVolts()
    {
        return $this->volts;
    }

    public function setVolts($volts)
    {
        $this->volts = $volts;
    }
}
/**
 * @Socket - Defines socket voltage(120)
 */
class Socket
{
    public function getVolt()
    {
        return new Volt(120);
    }
}
interface SocketAdapter
{

    public function get120Volt();

    public function get12Volt();

    public function get3Volt();
}
/**
 * @implements SocketAdapter
 * @extends Socket
 */
class SocketClassAdapterImpl extends Socket implements SocketAdapter
{
    /**
     * @get120Volt : Function returns 120v
     * @return int
     */
    public function get120Volt()
    {
        return SocketClassAdapterImpl::getVolt();
    }
    /**
     * @get12Volt : Function returns 12v
     * @return int
     */
    public function get12Volt()
    {
        $v = SocketClassAdapterImpl::getVolt();
        return SocketClassAdapterImpl::convertVolt($v, 10);
    }
    /**
     * @get3Volt : Function returns 3v
     * @return int
     */
    public function get3Volt()
    {
        $v = SocketClassAdapterImpl::getVolt();
        return SocketClassAdapterImpl::convertVolt($v, 40);
    }
    /**
     * @convertVolt - converts voltage
     * @return int
     */
    private function convertVolt($v, $i)
    {
        return new Volt($v->getVolts() / $i);
    }
}
class AdapterPatternTest
{
    /**
     * @main - calls testClassAdapter.
     */
    public function main()
    {
        AdapterPatternTest::testClassAdapter();
    }
    /**
     * @testClassAdapter - converts voltages to 3,12,120 volts
     * @var SocketClassAdapterImpl
     * @var int
     * @var int
     * @var int
     */
    private static function testClassAdapter()
    {
        $sockAdapter = new SocketClassAdapterImpl();
        $v3          = AdapterPatternTest::getVolt($sockAdapter, 3);
        $v12         = AdapterPatternTest::getVolt($sockAdapter, 12);
        $v120        = AdapterPatternTest::getVolt($sockAdapter, 120);
        echo "\nv3 volts using Class Adapter=" . $v3->getVolts();
        echo "\nv12 volts using Class Adapter=" . $v12->getVolts();
        echo "\nv120 volts using Class Adapter=" . $v120->getVolts();
    }
    /**
     * @getvolt - returns converted voltages
     * @return int
     */
    private static function getVolt($sockAdapter, $i)
    {
        switch ($i) {
            case 3:return $sockAdapter->get3Volt();
            case 12:return $sockAdapter->get12Volt();
            case 120:return $sockAdapter->get120Volt();
            default:return $sockAdapter->get120Volt();
        }
    }
}
$ref = new AdapterPatternTest();
$ref->main();
