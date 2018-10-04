<?php
/**
 * Abstract Class of EmployeePrototype
 */
abstract class EmployeePrototype {
    protected $Ename;
    protected $EmpSal;
    /**
     * abstract cloning method
     */
    abstract function __clone();

    function getEmpSal() {
        return $this->EmpSal;
    }
    function setEmpSal($EmpSal) {
        $this->EmpSal = $EmpSal;
    }
    function getEname() {
        return $this->Ename;
    }
}
/**
 * @Employee1 extends EmployeePrototype
 */
class Employee1 extends EmployeePrototype {
    function __construct($ename) {
        $this->Ename = $ename;
    }
    function __clone() {
    }
}
/**
 * @Employee2 extends EmployeePrototype
 */
class Employee2 extends EmployeePrototype {
    function __construct($ename) {
        $this->Ename = $ename;
    }
    function __clone() {
    }
}
/**
 * Get the Employee details from here
 */
  echo "Testing of prototype design pattern by creating objects of 2 employees";
  echo "";
  echo "\nEnter the name of the first employee : "; 
  $name1 = readline(); 
  echo "\nEnter the name of the second employee : "; 
  $name2 = readline(); 
  $e1 = new Employee1($name1);
  $e2 = new Employee2($name2);
  echo "\nEnter the salary of the first employee : ";
  $sal1 = readline();
  $e1->setEmpSal($sal1);
  echo "\nEnter the salary of the second employee : ";
  $sal1 = readline();
  $e2->setEmpSal($sal1);
 /**
  * Create the clone object of first employee
  */
  echo "Employee objects are cloned... : ";
  $e11 = clone $e1;
  echo "\nChange the salary of the first employee : ";
  $sal1 = readline();
  $e11->setEmpSal($sal1);
  /**
  * Create the clone object of second employee
  */
  $e12 = clone $e2;
  echo " \nChange the salary of the 2nd employee : ";
  $sal2 = readline();
  $e12->setEmpSal($sal2);
/**
 * Print employee1 data.
 */
  echo "\n..........Original object data ...\n";
  echo "\nEmployee 1 name: ".$e1->getEname();
  echo "\nEmployee 1 sal : ".$e1->getEmpSal();
  echo "";
/**
 * Print employee2 data.
 */
  echo "\nEmployee 2 name: ".$e2->getEname();
  echo "\nEmployee 2 sal : ".$e2->getEmpSal();
  echo "\n";

  /**
 * Print employee1 data.
 */
echo "\n.........Cloned object data.........\n";
echo "\nEmployee 1 name: ".$e11->getEname();
echo "\nEmployee 1 sal : ".$e11->getEmpSal();
echo "";
/**
* Print employee2 data.
*/
echo "\nEmployee 2 name: ".$e12->getEname();
echo "\nEmployee 2 sal : ".$e12->getEmpSal();
echo "\n";

?>