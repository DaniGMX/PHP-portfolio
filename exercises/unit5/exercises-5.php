<?php

include '../../HTML/Html.php';
include '../../HTML/Element.php';

$exercises = new ArrayOfElements();

$heading = new Element('h1', 'Test!');
$exercises[] = $heading;

$exercise1 = new Element('div', '', 'exercise', 'exercise_1');
$exercise1->appendChildren(new ArrayOfElements([
        new Element('h2', 'Exercise 1'),
        new Element('h3', 'Make the Html class Work!'),
        new Element('p', 'Success!!')
    ])
);
$exercises[] = $exercise1;
Html::make('Unit 4 Exercises', $exercises);

?>