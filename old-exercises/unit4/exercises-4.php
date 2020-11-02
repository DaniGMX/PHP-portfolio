<!DOCTYPE html>

<?php

require '..\..\utils\utils.php';
require '..\..\utils\classes\html.php';
include '1.php';
include '2.php';

// Page title and style

HTML::title("PHP Object Exercises", ['style' => "font-family:verdana"]);

// Page heading
HTML::append(HTML::makeElement('h1', ["PHP Object Exercises"]));

//exercise 1
$heading1 = HTML::makeElement('h2', "Exercise 1")
. HTML::makeElement('h4', [
    HTML::makeElement('p', ["To test out the linking of files you will create three .php files:"]),
    HTML::makeElement('ul', [],[
        HTML::makeElement('li', ["add.php: add one to the variable declared in 1.php."]),
        HTML::makeElement('li', ["substract.php remove one to the variable declared in 1.php."]),
        HTML::makeElement('li', ["1.php, the root script:"]),
        HTML::makeElement('ol', ['type' => 'i'], [
            HTML::makeElement('li', ["Declare a variable"]),
            HTML::makeElement('li', ["Link add.php so the variable is increased (do it random times)"]),
            HTML::makeElement('li', ["Link remove.php so the variable is decreased (do it random times)"]),
            HTML::makeElement('li', ["Finally print the variable"])
        ])
    ])
]);
$solution1 = HTML::makeElement('pre', ['
// add.php

function add($var) {
    $add = rand(5, 15);
    return $var + $add;
}

']) . 
HTML::makeElement('pre', ['
// substract.php 

function substract($var) {
    $sub = rand(5, 15);
    return $var - $sub;
}

']) .
HTML::makeElement('pre', ['
// 1.php 

include \'add.phh\';
include \'substract.phh\';

\$variable = 0;

\$variable = add(\$variable);
\$variable = substract(\$variable);

']) . HTML::makeElement('p', ["The solution is: $variable"]);

makeExercise($heading1, $solution1);



// exercise 2
$heading2 = HTML::makeElement('h2', ["Exercise 2"])
. HTML::makeElement('h4', [
        HTML::makeElement('p', ["Exercise 1 is a good example of what shouldn’t be ever done! Instead of that, reformulate the previous code into:"]),
        HTML::makeElement('ul', [],[
            HTML::makeElement('li', ["maths.php file with two functions to add and substract."]),
            HTML::makeElement('li', ["2.php, doing the same as 1 but calling those functions."])
        ])
    ]);
$solution2 = HTML::makeElement('pre', ['
// maths.php

function addition($var) {
    $add = rand(5, 15);
    return $var + $add;
}

function substraction($var) {
    $sub = rand(5, 15);
    return $var - $sub;
}

']) . 
HTML::makeElement('pre', ['
// 2.php 

include \'maths.php\';

$goodVariable = 0;

$goodVariable = addition($goodVariable);
$goodVariable = substraction($goodVariable);

']) .
HTML::makeElement('p', ["The solution is: $goodVariable"]);

makeExercise($heading2, $solution2);



// exercise 3
$heading3 = HTML::makeElement('h2', ["Exercise 3"])
. HTML::makeElement('h4', ["What happens if we pass the returning string of a method to a function? Is it by reference or by value? Show it with an example."]);

class Test {
    private $myString = "this is a test xd";

    function getMyString() { return $this->myString; }
}

function checkValueOrReferenceOfStringFromMethod($str) {
    $str .= ' MODIFIED XDDD';
    return $str;
}

$testClass = new Test();

$solution3 = HTML::makeElement('pre', ['
// Test class

class Test {
    public $myString = "this is a test xd";

    function getMyString() { return $myString; }
}

function checkValueOrReferenceOfStringFromMethod($str) {
    $str .= \' MODIFIED XDDD\';
    return $str;
}
'])
. HTML::makeElement('p', ["The class's string is, gotten by a getter method: " . $testClass->getMyString()])
. HTML::makeElement('p', ["The function then takes that string and returns: " . checkValueOrReferenceOfStringFromMethod($testClass->getMyString())])
. HTML::makeElement('p', ["The class's string is, after the function call, gotten by a getter method: " . $testClass->getMyString()])
. HTML::makeElement('p', ["As we can see, it is passed by value, not by reference."]);

makeExercise($heading3, $solution3);



// exercise 4
$heading4 = HTML::makeElement('h2', ["Exercise 4"]) 
. HTML::makeElement('h4', ["What happens if we copy an array (using the assignment operator) that contains some objects? Are they copied or referenced? Show it with an example."]);

$firstArray = ['0', '1', '2', '3'];
$secondArray = $firstArray;
$firstArray[] = '10';

function arrayToString($args) {
    $str = "[";
    foreach($args as $arr) {
        $str .= "[";
        foreach($arr as $el) {
            $str .= " $el,";
        }
        $str[-1] = "]";
    }
    $str .= "]";
    return $str;
}

$solution4 = HTML::makeElement('pre', ['
$firstArray = [0, 1, 2, 3];
$secondArray = $firstArray;
$firstArray[] = 10;

function arrayToString($args) {
    $str = "[";
    foreach($args as $arr) {
        $str .= "[";
        foreach($arr as $el) {
            $str .= " $el,";
        }
        $str[-1] = "]";
    }
    $str .= "]";
    return $str;
}
HTML::makeElement(\'p\', [arrayToString([$firstArray, $secondArray])]);
'])
. HTML::makeElement('p', [arrayToString([$firstArray, $secondArray])]);

makeExercise($heading4, $solution4);



// exercise 5
$heading5 = HTML::makeElement('h2', ["Exercise 5"]) 
. HTML::makeElement('h4', ["What happens if I try to set an object’s attribute that is not declared in the class? Will it work for all instances of that class or only for that specific object? What do you think that is happening? Show it with an example"]);

$solution5 = 0;

makeExercise($heading5, $solution5);



// exercise 6
$heading6 = HTML::makeElement('h2', ["Exercise 6"])
. HTML::makeElement('h4', ["Circular Reference how to avoid (example of the dog)."]);

$solution6 = 0;

makeExercise($heading6, $solution6);



// exercise 7
$heading7 = HTML::makeElement('h2', ["Exercise 7"]) 
. HTML::makeElement('h4', ["Protected can be accessed from the children classes and from the parent class! Show it in an example accessing both, methods and attributes."]);

$solution7 = 0;

makeExercise($heading7, $solution7);



// exercise 8
$heading8 = HTML::makeElement('h2', "Exercise 8")
. HTML::makeElement('h4', [
    HTML::makeElement('p', ["Create a class hierarchy including:"]),
    HTML::makeElement('ul', [],[
        HTML::makeElement('li', ["Abstract Figure class with two abstract methods and two attributes:"]),
        HTML::makeElement('ol', ['type' => 'i'], [
            HTML::makeElement('li', ["Abstract method getArea()"]),
            HTML::makeElement('li', ["Abstract method getPerimeter()"]),
            HTML::makeElement('li', ["x"]),
            HTML::makeElement('li', ["y"]),
            HTML::makeElement('li', ["y"]),
            HTML::makeElement('li', ["implement also the __toString() method."]),
            HTML::makeElement('li', ["Static attribute to hold the count of the number of objects of this type that exists at a given time."])
            ]),
        HTML::makeElement('li', ["Class Circle extends figure and implements the two methods"]),
        HTML::makeElement('ol', ['type' => 'i'], [
            HTML::makeElement('li', ["Add the attributes that you need to represent a circle (radius)."]),
            HTML::makeElement('li', ["Implement the __toString() method."]),
            HTML::makeElement('li', ["Static attribute to hold the count of the number of objects of this type that exists at a given time."])
            ]),
        HTML::makeElement('li', ["Class Rectangle extends figure and implements the two methods"]),
        HTML::makeElement('ol', ['type' => 'i'], [
            HTML::makeElement('li', ["Add the attributes that you need to represent a rectangle."]),
            HTML::makeElement('li', ["Implement the __toString() method."]),
            HTML::makeElement('li', ["Static attribute to hold the count of the number of objects of this type that exists at a given time."])
        ]),
        HTML::makeElement('li', ["Test that it works properly, you could need more things than requested (constructors, destructors, etc)."])
    ])
]);

$solution8 = 0;

makeExercise($heading8, $solution8);



// exercise 9
$heading9 = HTML::makeElement('h2', ["Exercise 9"])
. HTML::makeElement('h4', [
    HTML::makeElement('p', ["Create a class hierarchy including:"]),
    HTML::makeElement('ul', [],[
        HTML::makeElement('li', ["Hold an array with Figures"]),
        HTML::makeElement('li', ["Hold an array with Rectangles"]),
        HTML::makeElement('li', ["Hold an array with Circles"]),
        HTML::makeElement('li', ["Methods to create Circles or Rectangles (and store them in the proper array)."]),
        HTML::makeElement('li', ["Methods to show the contents of each array."]),
        HTML::makeElement('li', ["A single method, remove() that receives an object and removes it from all the arrays."]),
    ])
]);
$solution9 = 0;

makeExercise($heading9, $solution9);



// exercise 10
$heading10 = HTML::makeElement('h2', ["Exercise 10"]) . 
    HTML::makeElement('h4', ["What is the starting point when declaring paths in a require_once? Is this a good idea or you think it can give you problems?"]);

$solution10 = 0;

makeExercise($heading10, $solution10);



// exercise 11
$heading11 = HTML::makeElement('h2', ["Exercise 11"])
. HTML::makeElement('h4', ["Test the superglobal variables printing them on the screen. You need to be aware that some values of the \$_SERVER array may contain HTML code (so a simple var_dump can give you problems)."]);

$solution11 = 0;

makeExercise($heading11, $solution11);



// exercise 12
$heading12 = HTML::makeElement('h2', ["Exercise 12"])
. HTML::makeElement('h4', [
    HTML::makeElement('p', ["We want to recreate an ecosystem to make simulations about the life in the Savannah. To do it you have to create:"]),
    HTML::makeElement('ul', [],[
        HTML::makeElement('li', ["An Interface called Hunter."]),
        HTML::makeElement('ol', ['type' => 'i'], [
            HTML::makeElement('li', ["It has only a method called hunt that gets as an argument a Victim."])
        ]),
        HTML::makeElement('li', ["An interface called Victim."]),
        HTML::makeElement('ol', ['type' => 'i'], [
            HTML::makeElement('li', ["It has only a method called takeDamage that gets as an argument an integer"])
        ]),
        HTML::makeElement('li', ["Class Animal"]),
        HTML::makeElement('ol', ['type' => 'i'], [
            HTML::makeElement('li', ["It has to be abstract."]),
            HTML::makeElement('li', ["It has three properties to hold the name, the weight and the health."]),
            HTML::makeElement('li', ["It has a constructor that gets as arguments an integer for the weight and a string for the name."]),
            HTML::makeElement('li', ["Health is initialized at a random value between 50 and 350."]),
        ]),
        HTML::makeElement('li', ["Class Deer"]),
        HTML::makeElement('ol', ['type' => 'i'], [
            HTML::makeElement('li', ["Extends Animal"]),
            HTML::makeElement('li', ["It has an attribute called defence."]),
            HTML::makeElement('li', ["It has a constructor that gets as arguments an integer for the defence and a string for the name. From here, the parent constructor will be called assigning a weight of 10."]),
            HTML::makeElement('li', ["When you do an echo of a Deer object, something like the next must appear on screen: “I’m a Deer, my name is … I have … HP and a defence of …” (put its current values in the dots)."]),
            HTML::makeElement('li', ["Implements the interface Victim"]),
            HTML::makeElement('ol', ['type' => '1'], [
                HTML::makeElement('li', ["The method receiveDamage() will:"]),
                HTML::makeElement('ol', ['type' => 'a'], [
                    HTML::makeElement('li', ["Reduce the health of the animal the value received as argument minus the defence of the animal. If the value is positive. (80% of times)"]),
                    HTML::makeElement('li', ["Increase the health of the animal 5 points (20% of times)"]),
                ]),
            ]),
        ]),
        HTML::makeElement('li', ["Class Person"]),
        HTML::makeElement('ol', ['type' => 'i'], [
            HTML::makeElement('li', ["Extends Animal"]),
            HTML::makeElement('li', ["It has two attributes:"]),
            HTML::makeElement('ol', ['type' => '1'], [
                HTML::makeElement('li', ["Strength, with a random value between 50 and 70."]),
                HTML::makeElement('li', ["Age, that will get its value from the constructor."]),
            ]),
            HTML::makeElement('li', ["Implements Hunter"]),
            HTML::makeElement('ol', ['type' => '1'], [
                HTML::makeElement('li', ["The method hunt will calls the method takeDamage on the Victim received as parameter, providing as argument a random value between 0 and the strength of the Person."]),
            ]),
            HTML::makeElement('li', ["When you do an echo of a Person a message like this should appear: “I’m a person, my health is … and my strength is …”"]),
        ]),
        HTML::makeElement('li', ["Class Lion"]),
        HTML::makeElement('ol', ['type' => 'i'], [
            HTML::makeElement('li', ["Extends Animal"]),
            HTML::makeElement('li', ["It has an attribute, strength that will get its value from the constructor."]),
            HTML::makeElement('li', ["Implements Hunter"]),
            HTML::makeElement('ol', ['type' => '1'], [
                HTML::makeElement('li', ["The method hunt calls the method takeDamage on the Victim received as parameter and provides as argument:"]),
                HTML::makeElement('ol', ['type' => 'a'], [
                    HTML::makeElement('li', ["Its strength 80% of the times."]),
                    HTML::makeElement('li', ["Three times its strength 20% of the times (echo a message when this happens)."]),
                ]),
            ]),
            HTML::makeElement('li', ["When echoed it will print a message similar to this: “I’m a lion, my name is … I have … HP and an attack of …” (put its current values in the dots).”"]),
            HTML::makeElement('li', ["Implements Victim"]),
            HTML::makeElement('ol', ['type' => '1'], [
                HTML::makeElement('li', ["The method takeDamage will reduce the health of the Lion the amount received as parameter."]),
            ]),
        ]),
        HTML::makeElement('li', ["In the main script:"]),
        HTML::makeElement('ol', ['type' => 'i'], [
            HTML::makeElement('li', ["Create a function called isAlive that gets an animal as an argument. Will return a true if the health is above 0 or false otherwise."]),
            HTML::makeElement('li', ["Create a function called simulation that:"]),
            HTML::makeElement('ol', ['type' => '1'], [
                HTML::makeElement('li', ["Creates three animals:"]),
                HTML::makeElement('ol', ['type' => 'a'], [
                    HTML::makeElement('li', ["A Deer with defence 15 and named “Bambi”"]),
                    HTML::makeElement('li', ["A Lion with strength 50."]),
                    HTML::makeElement('li', ["A 22 years old man."])
                ]),
                HTML::makeElement('li', ["Create a loop that iterates while the Lon and the Deer are alive:"]),
                HTML::makeElement('ol', ['type' => 'a'], [
                    HTML::makeElement('li', ["Print the “Round” (iteration) number"]),
                    HTML::makeElement('li', ["Make the Lion hunt the deer"]),
                    HTML::makeElement('li', ["Make the man hunt the lion."]),
                    HTML::makeElement('li', ["Echo the three objects."])
                ]),
                HTML::makeElement('li', ["When the battle finishes you need to name the winner:"]),
                HTML::makeElement('ol', ['type' => 'a'], [
                    HTML::makeElement('li', ["The lion wins if is able to hunt the deer and not die."]),
                    HTML::makeElement('li', ["The deer wins if the man hunts the Lion before dying."]),
                    HTML::makeElement('li', ["The man wins if is the last man standing. No animal can survive."])
                ]),
            ]),
        ]),
    ])
]);

$solution12 = 0;

makeExercise($heading12, $solution12);

?>