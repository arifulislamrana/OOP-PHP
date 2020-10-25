<?php
class SubObject
{
    static $instances = 0;
    public $instance;

    public function __construct() {
        $this->instance = ++self::$instances;
    }

    public function __clone() {
        $this->instance = ++self::$instances;
    }
}

class MyCloneable
{
    public $object1;
    public $object2;

    function __clone()
    {
        // Force a copy of this->object, otherwise
        // it will point to same object.
        $this->object1 = clone $this->object1;
    }
}

$obj = new MyCloneable();

$obj->object1 = new SubObject();
$obj->object2 = new SubObject();

$obj2 = clone $obj;
$obj3 = $obj;


print("Original Object:\n");
print_r($obj);
echo '<br>';
print("Original copy Object:\n");
print_r($obj3);
echo '<br>';
print("Cloned Object:\n");
print_r($obj2);
echo '<br>';echo '<br>';echo '<br>';

?>

<?php
class Animals
{
public $name;
public $category;
}

//Creating instance of Animals class
$objAnimals = new Animals();
//Assigning values
$objAnimals->name = "Lion";
$objAnimals->category = "Wild Animal";
//Copy Objects by Assignment
$copyObj = $objAnimals;
//Cloning the original object
$objCloned = clone $objAnimals;
$objCloned->name = "Elephant";
$objCloned->category = "Wild Animal";
echo 'original:';
print_r($objAnimals);
echo '<br>'.'reference copy:';
print_r($copyObj);
echo '<br>'.'cloned:';
print_r($objCloned);
?>

<?php
class address{
   var $city="Nanded";
   var $pin="431601";
   function setaddr($arg1, $arg2){
      $this->city=$arg1;
      $this->pin=$arg2;
   }
}
class myclass{
   var $name="Raja";
   var $obj;
   function setname($arg){
      $this->name=$arg;
   }
}
$obj1=new myclass();
$obj1->obj=new address();
echo "original object\n";
print_r($obj1);
$obj2=$obj1;
$obj1->setname("Ravi");
echo "after change:\n";
print_r($obj1);
print_r($obj2);
?>