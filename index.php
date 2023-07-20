<html>
    <head>
        <title>
            <?php echo "Object oriented programming tutorial"; ?>
        </title>
    </head>
    <body>
        <?php
        echo "Hello world";
        ?>
        <?php

        class Animal{
            protected $name;
            protected $favourite_food;
            protected $sound;
            protected $id;

            public static $number_of_animals = 0;

            const PI = "3.14159";

            function getName(){
                return $this->name;

            }
            function __construct(){
                $this->id = rand(100, 1000000);
                echo $this->id . " has been assigned<br />";
                Animal::$number_of_animals++;
            }
            public function __destruct(){
                echo $this->name . " is being destroyed :(";
            }
            function __get($name){
                echo "Asked for " . $name . "<br />";
                return $this->$name;
            }
            function __set($name, $value){
                switch($name){
                    case "name":
                        $this->name = $value;
                        break;
                    case "favorite_food":
                        $this->favorite_food = $value;
                        break;
                    case "sound":
                        $this->sound = $value;
                        break;
                    default :
                    echo $name . "Not Found";
                }
                echo "Set " . $name . " to " . $value . "<br />";
            }

            function run(){
                echo $this->name . " runs<br />";
            }
        
            final function what_is_good(){
                echo "Running is Good<br />";
        
            }
            function __toString(){
                return $this->name . " says " . $this->sound .
        
                " give me some ". $this->favorite_food . " my id is " .
        
                $this->id . " total animals = " . Animal::$number_of_animals .
                "<br /><br />";
        
            }
  

            public function sing(){
                echo $this->name . " sings 'Grrrr grr grrr grrrrrrrrr'<br />";
            }
        
            // 7. static method
            static function add_these($num1, $num2){
                return ($num1 + $num2) . "<br />";
            }
        }
    

    // Inheritance 
    class Dog extends Animal implements Singable{
    
        // 2. You can override functions defined in the superclass
        function run(){
            echo $this->name . " runs like crazy<br />";
        }
        // 5. You must define any function defined in an interface
        public function sing(){
            echo $this->name . " sings 'Bow wow, woooow, woooooooooow'<br />";
    
        }
    
    }

    interface Singable{
        public function sing();
    }
    $animal_one = new Animal();

    // These call __set
    $animal_one->name = "Spot";
    
    $animal_one->favorite_food = "Meat";
    
    $animal_one->sound = "Ruff";
    echo $animal_one->name . " says " . $animal_one->sound .
    
        " give me some ". $animal_one->favorite_food . " my id is " .
    
        $animal_one->id . " total animals = " . Animal::$number_of_animals .
    
        "<br /><br />";
 
    // If we defined a constant in the class we would get its
    
    // value like this Class::CONTANT
    
    echo "Favorite Number " . Animal::PI . "<br />";
    $animal_two = new Dog();
    $animal_two->name = "Grover";
    $animal_two->favorite_food = "Mushrooms";
    $animal_two->sound = "Grrrrrrr";
    
    echo $animal_two->name . " says " . $animal_two->sound .
        " give me some ". $animal_two->favorite_food . " my id is " .
        $animal_two->id . " total animals = " . Dog::$number_of_animals .
        "<br /><br />";
    
    $animal_one->run();
    
    $animal_two->run();
    

    
    $animal_one->what_is_good();


    
    echo $animal_two;


    $animal_two->sing();
   
    function make_them_sing(Singable $singing_animal){
        $singing_animal->sing();
    }
    make_them_sing($animal_one);
    make_them_sing($animal_two);
    echo "<br />";
    
        ?>
    </body>
</html>