<!DOCTYPE html>
<?php

include '.\HTML\Html.php';
include '.\HTML\Element.php';
include '.\HTML\customs\NavBar.php';

//require '.\css\style.css';

$body = new ArrayOfElements();

// retrieve all exercise directories and store them in an ordered array
$exerciseCount = count( glob("exercises/*", GLOB_ONLYDIR));
$allDirs = scandir("exercises", SCANDIR_SORT_DESCENDING);
$exerciseDirs = array_reverse(array_diff($allDirs, array('.', '..')), FALSE);
$refs = [];
for ($i = 0; $i < $exerciseCount; $i++)
    $refs[$i] = 'exercises\\' . $exerciseDirs[$i] . '\\exercises-' . ($i + 1) . '.php';

// test NavBar
$navBar = new NavBar($exerciseDirs, $refs);
$body[] = $navBar;

$pageHeading = new Element('h1', "PAPI 20/21 - Daniel Gracia Machado");
$body[] = $pageHeading;

Html::make('PAPI - Daniel GM', $body);

// print("<pre>".print_r($_SERVER, true)."</pre>");
?>
