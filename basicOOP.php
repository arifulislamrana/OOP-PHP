<?php
    
    class A{

        public $variable1 = 'Hello';

        public $variable2 = ' Islam';

        function mergeVariable()
        {
        return $this->variable1 . $this->variable2;
        }
    }
    $x = new A();
    $x->variable1 = 'Ariful';
    print $x->mergeVariable();

    
?>