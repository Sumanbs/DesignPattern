<?php
class Volt
 {
	private $volts;
	
	public function __construct($v){
		$this->volts=$v;
	}

	public function getVolts() {
		return $this->volts;
	}

	public function setVolts($volts) {
		$this->volts=$volts;
	}	
}
class Socket 
{
    public function getVolt()
    {
		return new Volt(120);
	}
}   
interface SocketAdapter {

	public function get120Volt();
		
	public function get12Volt();
	
	public function get3Volt();
}

class SocketClassAdapterImpl extends Socket implements SocketAdapter
{
	public function get120Volt() {
		return SocketClassAdapterImpl::getVolt();
	}

		public function get12Volt() {
		 $v= SocketClassAdapterImpl::getVolt();
		return SocketClassAdapterImpl::convertVolt($v,10);
	}
	public function get3Volt() {
		$v= SocketClassAdapterImpl::getVolt();
		return SocketClassAdapterImpl::convertVolt($v,40);
	}
	private function convertVolt($v,$i) {
		return new Volt($v->getVolts()/$i);
	}
}
class SocketObjectAdapterImpl implements SocketAdapter
{
    public $sock;
    public function __construct()
    {
        $this->sock = new Socket();

    }
	public function get120Volt() {
		return $this->sock->getVolt();
	}


	public function get12Volt() {
		$v= $this->sock->getVolt();
		return SocketObjectAdapterImpl::convertVolt($v,10);
	}


	public function get3Volt() {
		$v= $this->sock->getVolt();
		return SocketObjectAdapterImpl::convertVolt($v,40);
	}
	
	private function convertVolt($v,$i) {
		return new Volt($v->getVolts()/$i);
	}
}
class AdapterPatternTest
 {

    public function main()
    {
		
		AdapterPatternTest::testClassAdapter();
		AdapterPatternTest::testObjectAdapter();
	}

	private static function testObjectAdapter() {
		$sockAdapter = new SocketObjectAdapterImpl();
		$v3 = AdapterPatternTest::getVolt($sockAdapter,3);
		$v12 = AdapterPatternTest::getVolt($sockAdapter,12);
		$v120 = AdapterPatternTest::getVolt($sockAdapter,120);
		echo "\nv3 volts using Object Adapter=" .$v3->getVolts();
		echo "\nv12 volts using Object Adapter=" .$v12->getVolts();
		echo "\nv120 volts using Object Adapter=" .$v120->getVolts();
	}

	private static function testClassAdapter() {
	    $sockAdapter = new SocketClassAdapterImpl();
		$v3 = AdapterPatternTest::getVolt($sockAdapter,3);
		$v12 = AdapterPatternTest::getVolt($sockAdapter,12);
		$v120 = AdapterPatternTest::getVolt($sockAdapter,120);
		echo "\nv3 volts using Class Adapter=" .$v3->getVolts();
		echo "\nv12 volts using Class Adapter=" . $v12->getVolts();
		echo "\nv120 volts using Class Adapter=". $v120->getVolts();
	}
	
	private static function getVolt($sockAdapter, $i) {
		switch ($i){
		case 3: return $sockAdapter->get3Volt();
		case 12: return $sockAdapter->get12Volt();
		case 120: return $sockAdapter->get120Volt();
		default: return $sockAdapter->get120Volt();
		}
	}
}
$ref = new AdapterPatternTest();
$ref->main();



?>