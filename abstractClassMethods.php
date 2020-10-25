<?php
//Can we have non abstract methods inside an abstract class?
    abstract class Car5 {
        // Abstract classes can have properties
        protected $tankVolume;
    
        // Abstract classes can have non abstract methods
        public function setTankVolume($volume)
        {
        $this -> tankVolume = $volume;
        }
    
        // Abstract method
        abstract public function calcNumMilesOnFullTank();
    }
  

    //How to create child classes from an abstract class?
    class Toyota extends Car5 {
        // Since we inherited abstract method, we need to define it in the child class, 
        // by adding code to the method's body.
        public function calcNumMilesOnFullTank()
        {
          return $miles = $this -> tankVolume*33;
        }
       
        public function getColor()
        {
          return "beige";
        }
      }

      $toyota1 = new Toyota();
    $toyota1 -> setTankVolume(10);
    echo $toyota1 -> calcNumMilesOnFullTank();//330
    echo $toyota1 -> getColor();//beige
?>