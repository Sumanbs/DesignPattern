<?php
/**
 * @Description - Visitor pattern ​ is used when we have to perform an operation on a group of similar kind
 * of Objects. With the help of visitor pattern, we can move the operational logic from the
 * objects to another class.
 */
interface itemelement
{
    public function accept(ShoppingCartVisitor $ref);
}
/**
 * @Book -implements  itemelement.
 * @var int
 * @var int
 */
class Book implements itemelement
{
    private $price;
    private $isbnNumber;
    /**
     * @Constructor - Initializes price and isbnNumber
     */
    public function __construct($isbnNumber, $price)
    {
        $this->price       = $price;
        $this->$isbnNumber = $isbnNumber;
    }
    /**
     * @getprice - returns price
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }
    /**
     * @getisbnNumber - returns isbnNumber
     * @return int
     */
    public function getisbnNumber()
    {
        return $this->isbnNumber;
    }
    public function accept(ShoppingCartVisitor $ref)
    {
        return $ref->visitb($this);
    }
}
/**
 * @Fruit initializes all data members and returns variables.
 */
class Fruit implements itemelement
{
    private $priceperkg;
    private $weight;
    private $name;

    public function __construct($priceperkg, $weight, $name)
    {
        $this->priceperkg = $priceperkg;
        $this->weight     = $weight;
        $this->name       = $name;

    }
    /**
     * @getpriceperkg - gives priceper kg
     * @return integer
     */
    public function getpriceperkg()
    {
        return $this->priceperkg;
    }
    /**
     * @getweight - gives weight of the fruit
     * @return integer
     */
    public function getweight()
    {
        return $this->weight;
    }
    /**
     * @getname - gives name of the fruit
     * @return string
     */
    public function getname()
    {
        return $this->name;
    }
    public function accept(ShoppingCartVisitor $ref)
    {
        return $ref->visitf($this);
    }
}
/**
 * @interface - has 2 functions
 */
interface ShoppingCartVisitor
{
    public function visitb($book);
    public function visitf($fruit);
}
class ShoppingCartVisitorImpl implements ShoppingCartVisitor
{
    /**
     * @visitb - function calculates the book cost
     * @return int
     */
    public function visitb($book)
    {
        $cost = $book->getPrice();
        echo "Book ISBN number = " . $book->getisbnNumber() . " and cost is =  " . $cost;
        return $cost;
    }
    /**
     * @visitb - function calculates the fruit cost
     * @return int
     */
    public function visitf($fruit)
    {
        $cost = $fruit->getpriceperkg() * $fruit->getweight();
        echo "Fruit name = " . $fruit->getname() . "  and cost is = " . $cost;
        return $cost;
    }
}
/**
 * ShoppingCartClient - takes inputs from user and creates object of FRUIT and BOOK
 */
class ShoppingCartClient
{
    public function main()
    {
        $flag = 1;
        $res  = 0;
        while ($flag) {
            echo "\n\nWelcome to shopping cart..Its having 2 items(books and fruits)\n";
            echo "1.Buy fruits\n";
            echo "2.Buy books\n";
            echo "Press any key to calculate the result....";
            $n = readline();
            /**
             * Get the fruit details
             */
            if ($n == 1) {
                echo "Enter the name of the fruit you want to buy-";
                $name = readline();
                echo "How many kg's do you want to purchase?";
                $weight = readline();
                echo "Enter the price of the fruit :";
                $price   = readline();
                $items   = new Fruit($price, $weight, $name);
                $visitor = new ShoppingCartVisitorImpl();
                $res     = $res + $items->accept($visitor);
                echo "\n*****Cart total amount = " . $res . "*******";
                /**
                 * Get the books details
                 */
            } else if ($n == 2) {
                echo "Enter the ISBN number of the book : ";
                $isbn = readline();
                echo "Enter the price of the book :";
                $price   = readline();
                $items   = new Book($isbn, $price);
                $visitor = new ShoppingCartVisitorImpl();
                $res     = $res + $items->accept($visitor);
                echo "Cart total amount = " . $res;
            } else {
                echo "Total price  = " . $res;
                $flag = 0;
            }
        }
    }
}

$rea = new ShoppingCartClient();
$rea->main();
