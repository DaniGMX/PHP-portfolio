<?php

include '../../HTML/Html.php';
include '../../HTML/Element.php';

$exercises = new ArrayOfElements();

$heading = new Element('h1', 'Another Test!');
$exercises[] = $heading;

$exercise1 = new Element('div', '');
$exercise1->appendChildren(new ArrayOfElements([
        new Element('h2', 'This is another test'),
        new Element('h3', 'Make the Html class Work in another file!'),
        new Element('p', 'Successsssssssss!!')
    ])
);
$exercise1->addStyle('background-color', 'purple');
$exercises[] = $exercise1;
Html::make('Unit 4 Exercises', $exercises);

?>