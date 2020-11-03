<?php

include '../../HTML/Html.php';
include '../../HTML/Element.php';

$exercises = new ArrayOfElements();

$heading = new Element('h1', 'Testing the dropdown');
$exercises[] = $heading;

$exercise1 = new Element('div', '');
$exercise1->appendChildren(new ArrayOfElements([
        new Element('h2', 'Erxercise 1'),
        new Element('h3', 'xddddd'),
        new Element('p', 'lmao')
    ])
);
$exercises[] = $exercise1;
Html::make('Unit 4 Exercises', $exercises);

?>