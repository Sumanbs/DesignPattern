<?php

abstract class BookPrototype {
    protected $title;
    protected $topic;
    abstract function __clone();
    function getTitle() {
        return $this->title;
    }
    function setTitle($titleIn) {
        $this->title = $titleIn;
    }
    function getTopic() {
        return $this->topic;
    }
}

class PHPBookPrototype extends BookPrototype {
    function __construct() {
        $this->topic = 'PHP';
    }
    function __clone() {
    }
}

class SQLBookPrototype extends BookPrototype {
    function __construct() {
        $this->topic = 'SQL';
    }
    function __clone() {
    }
}
 
  echo "BEGIN TESTING PROTOTYPE PATTERN";
  echo "";

  $phpProto = new PHPBookPrototype();
  $sqlProto = new SQLBookPrototype();

  $book1 = clone $sqlProto;
  $book1->setTitle("SQL For Cats");
  echo "Book 1 topic: ".$book1->getTopic();
  echo "Book 1 title: ".$book1->getTitle();
  echo "";

  $book2 = clone $phpProto;
  $book2->setTitle("OReilly Learning PHP 5");
  echo "Book 2 topic: ".$book2->getTopic();
  echo "Book 2 title: ".$book2->getTitle();
  echo "";

  $book3 = clone $sqlProto;
  $book3->setTitle("OReilly Learning SQL");
  echo "Book 3 topic: ".$book3->getTopic();
  echo "Book 3 title: ".$book3->getTitle();
  echo "";

  echo "END TESTING PROTOTYPE PATTERN";

//   function echo($line_in) {
//     echo $line_in."\n";
//   }

?>