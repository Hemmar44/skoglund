<?php

class Table {
 
    public $legs;
    //public $all_legs;
    static public $total_tables;
    static public $all_legs;
            
    function __construct($leg_count){
        $this->legs = $leg_count; //jezeli w parametrze nie podamy ilości to trzeba ją podać tworząc instancję jako argument klasy
        //$this -> all_legs += $this->legs;
        self::$total_tables++;
        self::$all_legs += $leg_count;
    }
}

$table = new Table(4);

echo $table -> legs ."<br/>";

echo Table::$total_tables ."<br/>";
$t1 = new Table(4); 
echo Table::$total_tables ."<br/>";
$t2 = new Table(5); 
echo Table::$all_legs."<br/>";
$t3 = new Table(8);
echo Table::$all_legs."<br/>";

 ?>
