<?php
    class CarA {
 
        // public methods and properties.
        public $model;    
       
        public function getModel()
        {
          return "From Class A:The car model is " . $this -> model.'.';
        }
      }
       
      $mercedes = new CarA();
      //Here we access a property from outside the class
      $mercedes -> model = "Mercedes";
      //Here we access a method from outside the class
      echo $mercedes -> getModel();
?>


<?php
 
    class CarB {
    
    //the private access modifier denies access to the method from outside the class’s scope
    private $model;
    
    //the public access modifier allows the access to the method from outside the class
    public function setModel($model)
    {
        $this -> model = $model;
    }
    
    public function getModel()
    {
        return "From class B:The car model is  " . $this -> model;
    }
    }
    
    $mercedes = new CarB();
    //Sets the car’s model
    $mercedes -> setModel("Mercedes benz");
    //Gets the car’s model
    echo $mercedes -> getModel();
 
?>