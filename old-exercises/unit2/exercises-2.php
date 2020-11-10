<!DOCTYPE html>

<?php

require '..\..\utils\utils.php';
require '..\..\utils\classes\html.php';

// HTML headings
HTML::title("Hello PHP exercises", ['style' => "font-family:verdana"]);

// page Heading
HTML::append(HTML::makeElement('h1', ["Hello PHP Exercises!"]));

// exercise 1
$backslash = "Hello World\\";
$singleQuote = "Hello \' World";
HTML::append(
    HTML::makeElement('div', [
        HTML::makeElement('h2', ["Exercise 1"]),
        HTML::makeElement('h3', ["Can you produce this output using single quote strings?"]),
        HTML::makeElement('h4', ["\ at the end of the line? >>> Hello World\ "]),
        HTML::makeElement('p', ["{$backslash}"]),
        HTML::makeElement('h4', ["\’ at any point in the line? >>> Hello \’ world"]),
        HTML::makeElement('p', ["{$singleQuote}"])
    ])
);
HTML::separate();

// exercise 2
HTML::append(
    HTML::makeElement('div', [
        HTML::makeElement('h2',["Exercise 2"]),
        HTML::makeElement('h3', ["Why do I need to put double slash in “c:\\xampp”? What happens if I do not put them?"]),
        HTML::makeElement('p', ["Because a simple \\ is used for escape sequences, such as \\n or \\r."]),
    ])
);
HTML::separate();

// exercise 3
$integer = return_var_dump(1234);
$float = return_var_dump(12.34);
$string = return_var_dump("Twelve hundred and thirtyfour");
$boolean = return_var_dump(true);
HTML::append(
    HTML::makeElement('div', [
        HTML::makeElement('h2', ["Exercise 3"]),
        HTML::makeElement('h3', ["What can a variable store?  Show the four different scalar types using var_dump."]),
        HTML::makeElement('p', ["{$integer}" . "<br>" . "{$float}" . "<br>" . "{$string}" . "<br>" . "{$boolean}"])
    ])
);
HTML::separate();

// exercise 4
HTML::append(
    HTML::makeElement('div', [
        HTML::makeElement('h2', ["Exercise 4"]),
        HTML::makeElement('h3', ["What is the difference between \$variable = 1 and \$variable == 1?"]),
        HTML::makeElement('p', ["One is a declaration and the other a comparison"])
    ])
);
HTML::separate();

// exercise 5
HTML::append(
    HTML::makeElement('div', [
        HTML::makeElement('h2', ["Exercise 5"]),
        HTML::makeElement('h3', ["Underscore is allowed in variable names (\$current_user), whereas hyphens are not (\$current-user). Why? (make a guess)"]),
        HTML::makeElement('p', ["Because hyphens are interpreted as minus signs and the compiler tries to operate (?)."])
    ])
);
HTML::separate();

// exercise 6
HTML::append(
    HTML::makeElement('div', [
        HTML::makeElement('h2', ["Exercise 6"]),
        HTML::makeElement('h3', ["Are variable names case-sensitive?"]),
        HTML::makeElement('p', ["Yes, but we should try to avoid that, use snake-case instead."])
    ])
);
HTML::separate();

// exercise 7
HTML::append(
    HTML::makeElement('div', [
        HTML::makeElement('h2', ["Exercise 7"]),
        HTML::makeElement('h3', ["Can you use spaces in variable names?"]),
        HTML::makeElement('p', ["No, as the compiler will just save whatever is before the space as the variable name."])
    ])
);
HTML::separate();

// exercise 8
HTML::append(
    HTML::makeElement('div', [
        HTML::makeElement('h2', ["Exercise 8"]),
        HTML::makeElement('h3', ["How do you explicitly convert one variable type to another (say, a string to a number)?"]),
        HTML::makeElement('p', ["Just by reassigning its value to one of the types you want to, as PHP is dynamically typed."])
    ])
);
HTML::separate();

// exercise 9
HTML::append(
    HTML::makeElement('div', [
        HTML::makeElement('h2', ["Exercise 9"]),
        HTML::makeElement('h3', ["What is the difference between ++\$j and \$j++?"]),
        HTML::makeElement('p', ["One returns the value before adding and another one adds the value before returning it"])
    ])
);
HTML::separate();

// exercise 10
HTML::append(
    HTML::makeElement('div', [
        HTML::makeElement('h2', ["Exercise 10"]),
        HTML::makeElement('h3', ["Are the operators && and and interchangeable?"]),
        HTML::makeElement('p', ["No, as the && has greater precedence"])
    ])
);
HTML::separate();

// exercise 11
HTML::append(
    HTML::makeElement('div', [
        HTML::makeElement('h2', ["Exercise 11"]),
        HTML::makeElement('h3', ["Can you redefine a constant?"]),
        HTML::makeElement('p', ["No, you can’t, that’s why they are called constants."])
    ])
);
HTML::separate();

// exercise 12
HTML::append(
    HTML::makeElement('div', [
        HTML::makeElement('h2', ["Exercise 12"]),
        HTML::makeElement('h3', ["When would you use the === (identity) operator?"]),
        HTML::makeElement('p', ["When I am comparing the value and the type of two parameters of which I’m not sure the type of."])
    ])
);
HTML::separate();

// exercise 13
HTML::append(
    HTML::makeElement('div', [
        HTML::makeElement('h2', ["Exercise 13"]),
        HTML::makeElement('h3', ["Why is a for loop more powerful than a while loop?"]),
        HTML::makeElement('p', ["Because a while loop can derive into an infinite loop if not managed correctly, but they both are the same."])
    ])
);
HTML::separate();

// exercise 14
HTML::append(
    HTML::makeElement('div', [
        HTML::makeElement('h2', ["Exercise 14"]),
        HTML::makeElement('h3', ["What happens when there is an overflow in an integer value? To check it, create a loop that increases an “integer variable” and overflows it. Use var_dump so we can see the moment where the overflow occurs. (If you iterate from 0 it will take too much time, use the constants in PHP, slide 23, to iterate only “around” the overflow)."]),
        HTML::makeElement('p', ["idk dude, var_dump() is so goddamn expensive lol"])
    ])
);
HTML::separate();

// exercise 15
$oneToTen = array(1, 2, 3 ,4 ,5 , 6, 7, 8, 9 ,10);
$three = 3;
$threeTable = array();
for ($i = 0; $i < 10; ++$i){
    $threeTable[] = HTML::makeElement('tr', [
        HTML::makeElement('td', [$oneToTen[$i]]),
        HTML::makeElement('td', [$three * ($i + 1)])
    ]);
}
HTML::append(
    HTML::makeElement('div', [
        HTML::makeElement('h2', ["Exercise 15"]),
        HTML::makeElement('h3', ["Create a script that prints a multiplication table (from 1 to 10) for a given number."]),
        HTML::makeElement('table', ['border' => "2px"], [
                HTML::makeElement('tbody', $threeTable)
            ])
    ])
);
HTML::separate();

// exercise 16
$four = 4;
$negTen = -10;
$ten = 10;
$negTenToTen = range($negTen, $ten);
$fourTable = array();
for ($i = 0; $i < $ten - $negTen + 1; ++$i) {
    $fourTable[] = HTML::makeElement('tr', [
        HTML::makeElement('td', [$negTenToTen[$i]]),
        HTML::makeElement('td', [$four * ($i + $negTen)])
    ]);
}
HTML::append(
    HTML::makeElement('div', [
        HTML::makeElement('h2', ["Exercise 16"]),
        HTML::makeElement('h3', ["Modify (copy it first) again the script so it work also for negative indexes (-10,10)."]),
        HTML::makeElement('table', ['border' => "2px"], [
            HTML::makeElement('tbody', $fourTable)
        ])
    ])
);
HTML::separate();

// exercise 17
$five = 5;
$negThree = -3;
$eleven = 11;
$negThreeToEleven = range($negThree, $eleven);
$fiveTable = array();
for ($i = 0; $i < $eleven - $negThree + 1; ++$i) {
    $fiveTable[] = HTML::makeElement('tr', [
        HTML::makeElement('td', [$negThreeToEleven[$i]]),
        HTML::makeElement('td', [$five * ($i + $negThree)])
    ]);
}
HTML::append(
    HTML::makeElement('div', [
        HTML::makeElement('h2', ["Exercise 17"]),
        HTML::makeElement('h3', ["Modify (copy it first) the script so you can print the multiplication table of a given number but between the indexes you want (instead of 1 to 10)."]),
        HTML::makeElement('table', ['border' => "2px"], [
            HTML::makeElement('tbody', $fiveTable)
        ])
    ])
);
HTML::separate();

// exercise 18
$ascii = range(0, 255);
$asciiTable = array();
for ($i = 0; $i < 128 / 16; ++$i) {
    $asciiRows = array();
    for ($j = 0; $j < 128 / 8; ++$j) {
        $index = $j + ($i * 16);
        $asciiRows[] = HTML::makeElement('td', ["{$index}: " . chr($index)]);
    }
    $asciiTable[] = HTML::makeElement('tr', $asciiRows);
}
HTML::append(
    HTML::makeElement('div', [
        HTML::makeElement('h2', ["Exercise 18"]),
        HTML::makeElement('h3', ["Tables in HTML are really easy (https://www.w3schools.com/html/html_tables.asp) Can you create a loop to print the ASCII table (for each element print the integer value and the resulting char)?"]),
        HTML::makeElement('table', ['border' => "2px"], [
            HTML::makeElement('tbody', $asciiTable)
        ])
    ])
);
HTML::separate();

// exercise 19
$to = 121;
$phrases = array();
for ($i = 0; $i < $to; ++$i) {
    $even = $i % 2 == 0;
    $thre = $i % 3 == 0;
    $both = $even && $thre;

    if ($both)
        $phrases[] = HTML::makeElement('p', ["Number {$i} is even and a multiple of three!"]);
    else if ($even)
        $phrases[] = HTML::makeElement('p', ["Number {$i} is just even!"]);
    else if ($thre)
        $phrases[] = HTML::makeElement('p', ["Number {$i} is just a multiple of three!"]);
}
HTML::append(
    HTML::makeElement('div', [
        HTML::makeElement('h2', ["Exercise 19"]),
        HTML::makeElement('h3', ["Create a loop from 0 to x that prints even numbers (I am #, an even number) and numbers that are multiple of 3 ( I am #, multiple of 3). If both conditions happen at the same time only one line should be produced (I am #, an even number multiple of 3)."]),
        HTML::makeElement('p', $phrases)
    ])
);

Html::ending();

?>