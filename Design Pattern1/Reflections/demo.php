<?php
/**
 * @Desciption : Implementation of Reflection class..
 */
interface shape
{
    public function draw($c1);
}
/**
 * @Circle implements shape
 */
class Circle implements shape
{
    public $rad;
    /**
     * initializes rad
     */
    public function __construct($rad)
    {
        $this->rad = $rad;
    }
    /**
     * @draw - implemented function to draw the circle.
     */
    public function draw($c1)
    {
        echo "drawing circle of " . $c1->getRadius() . "cm";
    }
    /**
     * @getRadius - this function gives radius of circle.
     */
    public function getRadius()
    {
        return $this->rad;
    }
}
/**
 * @SemiCircle - extends Circle and implements shape
 */
class SemiCircle extends Circle implements shape
{
    public function draw($c1)
    {
        echo "Drawing semicircle of radius " . SemiCircle::getRadius() . "cm";
    }
}
/**
 * @ReflectionEx - class to implement Reflection.
 */
class ReflectionEx
{
    /**
     * function to create circle and semicircle objects.
     */
    public function reflect()
    {
        $c1 = new Circle(3);
        $c1->draw($c1);
        $reflection = new ReflectionClass(new SemiCircle(5));
        //$rm         = new ReflectionMethod(new SemiCircle(5));
        $flag = 1;
        while ($flag) {
            echo "\n1.Get the name of the class  \n2.Get parent class details  \n3.Get interface class details  \n4.Get method details of the class  \n5.Get constructor details of the class \n6.Exit\n";
            $n = readline();

            switch ($n) {
                case 1:
                    echo $reflection->getName();
                    break;
                case 2:
                    $parent = $reflection->getParentClass();
                    echo $parent->getName();
                    break;
                case 3:
                    $interfaces = $reflection->getInterfaceNames();
                    var_dump($interfaces);
                    break;
                case 4:
                    $methods = $reflection->getMethods();
                    var_dump($methods);
                    break;
                case 5:
                    $constructor = $reflection->getConstructor();
                    var_dump($constructor);
                    break;
                case 6:
                    $flag = 0;
                    break;

                default:
                    echo "Invalid entry";
                    break;
            }
        }
    }
}
/**
 * @var instance of ReflectionEx
 */
$f1 = new ReflectionEx();
$f1->reflect();
