<?php
  ///__constructor
    class Car2{
        private $model;
       
        // A constructor method.
        public function __construct($model)
        {
          $this -> model = $model;
        }
      }

      $car1 = new Car2("Mercedes");



    //How to write a constructor method without risking an error?
    class Car3 {
        // The $model property has a default value of "N/A"
        private $model = "N/A";
        
        // We don’t have to assign a value to the $model property
        //since it already has a default value
        public function __construct($model = null)
        {
          // Only if the model value is passed it will be assigned
          if($model) 
          { 
            $this -> model = $model;
          }
        }
         
        public function getCarModel()
        {
          return ' The car model is: ' . $this -> model;
        }
      }
        
      //We create the new Car object without passing a value to the model
      $car1 = new Car3();
        
      echo $car1 -> getCarModel();







      //__Destructor

    class Student {
        private $name;
        private $email;
    
        public function __construct($name, $email) 
        {
            $this->name = $name;
            $this->email = $email;
        }
    
        public function __destruct() 
        {
            echo 'This will be called when the script is shut down...';
            // save object state/other clean ups
        }
    }
    
    $objStudent = new Student('John', 'john@tutsplus.com');
   





    //Magic constants __name__
    class Car4 {
        private $model = '';
        
        //__construct
        public function __construct($model = null)
        {
          if($model) 
          { 
            $this -> model = $model;
          }
        }
         
        public function getCarModel()
        {
          //We use the __CLASS__ magic constant in order to get the class name
        
          return " The <b>" . __CLASS__ . "</b> model is: " . $this -> model;
        }
      }
        
      $car1 = new Car4('Mercedes');
        
      echo $car1 -> getCarModel();  








      //__set and __get method
      class Student1 {
        private $data = array();
     
        public function __set($name, $value) 
        {
            $this->data[$name] = $value;
        }
     
        public function __get($name) 
        {
            If (isset($this->data[$name])) {
                return $this->data[$name];
            }
        }
    }
     
    $objStudent = new Student1();
     
    //  __set() called
    $objStudent->phone = '0491 570 156';   
     
    //  __get() called
    echo $objStudent->phone;








    //__call and __callstatic()
    class MethodTest{
    public function __call($name, $arguments)
    {
        // Note: value of $name is case sensitive.
        echo "Calling object method '$name' "
             . implode(', ', $arguments). "\n";
    }

    /**  As of PHP 5.3.0  */
    public static function __callStatic($name, $arguments)
    {
        // Note: value of $name is case sensitive.
        echo "Calling static method '$name' "
             . implode(', ', $arguments). "\n";
    }
}

$obj = new MethodTest;
$obj->runTest('in object context');

MethodTest::runTest('in static context');  // As of PHP 5.3.0






///__isset() and __unset()
class PropertyTest
{
    /**  Location for overloaded data.  */
    private $data = array();

    /**  Overloading not used on declared properties.  */
    public $declared = 1;

    /**  Overloading only used on this when accessed outside the class.  */
    private $hidden = 2;

    public function __set($name, $value)
    {
        echo "Setting '$name' to '$value'\n";
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        echo "Getting '$name'\n";
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }

        $trace = debug_backtrace();
        trigger_error(
            'Undefined property via __get(): ' . $name .
            ' in ' . $trace[0]['file'] .
            ' on line ' . $trace[0]['line'],
            E_USER_NOTICE);
        return null;
    }

    /**  As of PHP 5.1.0  */
    public function __isset($name)
    {
        echo "Is '$name' set?\n";
        return isset($this->data[$name]);
    }

    /**  As of PHP 5.1.0  */
    public function __unset($name)
    {
        echo "Unsetting '$name'\n";
        unset($this->data[$name]);
    }

    /**  Not a magic method, just here for example.  */
    public function getHidden()
    {
        return $this->hidden;
    }
}


echo "<pre>\n";

$obj = new PropertyTest;

$obj->a = 1;
echo $obj->a . "\n\n";

var_dump(isset($obj->a));
unset($obj->a);
var_dump(isset($obj->a));
echo "\n";

echo $obj->declared . "\n\n";

echo "Let's experiment with the private property named 'hidden':\n";
echo "Privates are visible inside the class, so __get() not used...\n";
echo $obj->getHidden() . "\n";
echo "Privates not visible outside of class, so __get() is used...\n";
echo $obj->hidden . "\n";









//sleep and wakeup functions
class Connection
{
    protected $link;
    private $dsn, $username, $password;
    
    public function __construct($dsn, $username, $password)
    {
        $this->dsn = $dsn;
        $this->username = $username;
        $this->password = $password;
        $this->connect();
    }
    
    private function connect()
    {
        $this->link = new PDO($this->dsn, $this->username, $this->password);
    }
    
    public function __sleep()
    {
        return array('dsn', 'username', 'password');
    }
    
    public function __wakeup()
    {
        $this->connect();
    }
}
?>