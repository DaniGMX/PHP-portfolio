<?php

include '.\HTML\Html.php';
include '.\HTML\Element.php';
include '.\HTML\customs\NavBar.php';
include '.\HTML\customs\Dropdown.php';

//require '.\css\style.css';

$body = new ArrayOfElements();

// retrieve all exercise directories and store them in an ordered array
$exerciseCount = count( glob("old-exercises/*", GLOB_ONLYDIR));
$allDirs = scandir("old-exercises", SCANDIR_SORT_DESCENDING);
$exerciseDirs = array_reverse(array_diff($allDirs, array('.', '..')), FALSE);
$refs = [];
for ($i = 0; $i < $exerciseCount; $i++)
    $refs[$i] = 'old-exercises\\' . $exerciseDirs[$i] . '\\exercises-' . ($i + 1) . '.php';

// test NavBar
$navBar = new NavBar($exerciseDirs, $refs);

// test dropdown

$dropdownTest = new Dropdown('Dropdown test', ['Element 1', 'Element 2'], ['#', '#']);
$navBar->appendChild($dropdownTest);
$body[] = $navBar;

$pageHeading = new Element('h1', "PAPI 20/21 - Daniel Gracia Machado");
$body[] = $pageHeading;

Html::make('PAPI - Daniel GM', $body);

// print("<pre>".print_r($_SERVER, true)."</pre>");

function scanNewExercises() {
    $unitsCount = count(glob("exercises/*", GLOB_ONLYDIR));
    $allDirNames = scandir("exercises", SCANDIR_SORT_DESCENDING);
    $unitDirNames = array_reverse(array_diff($allDirNames, array('.', '..')), FALSE);
    $exercises = [];
    $exercisesRefs = [];
    
    foreach ($unitDirNames as $unitDir) {
        $allUnit1Dirs = scandir($unitDir, SCANDIR_SORT_DESCENDING);
    }
}

?>
