<?php
//without late static binding
class A {
    public static function who() {
        echo __CLASS__;
    }
    public static function test() {
        self::who();
    }
}

class B extends A {
    public static function who() {
        echo __CLASS__;
    }
}

B::test(); //results-->A
?>



<?php
//with late static binding
class A1 {
    public static function who() {
        echo __CLASS__;
    }
    public static function test() {
        static::who(); // Here comes Late Static Bindings
    }
}

class B1 extends A1 {
    public static function who() {
        echo __CLASS__;
    }
}

B::test();  // results-->B1
?>




<?php
class A2 {
    private function foo() {
        echo "success!\n";
    }
    public function test() {
        $this->foo();
        static::foo();
    }
}

class B2 extends A2 {
   /* foo() will be copied to B, hence its scope will still be A and
    * the call be successful */
}

class C extends A2 {
    private function foo() {
        /* original method is replaced; the scope of the new one is C */
    }
}

$b = new B2();
$b->test();
$c = new C();
$c->test();   //fails

//output:
// success!
// success!
// success!


// Fatal error:  Call to private method C::foo() from context 'A' in /tmp/test.php
?>





<?php
//Finally we can implement some ActiveRecord methods:
class Model
{
    protected static $name;
    public static function find()
    {
        echo static::$name;
    }
}

class Product extends Model
{
    protected static $name = 'Product';
}

Product::find();

?>