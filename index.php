<?php

include_once './HTML/Html.php';
include_once './HTML/Element.php';
include_once './HTML/Styles/Style.php';
include_once './HTML/Styles/Modifier.php';
include_once './HTML/Customs/NavBar/NavBar.php';
include_once './HTML/Customs/NavBar/Dropdown.php';
include_once './HTML/Customs/Tree/Tree.php';

//require '.\css\style.css';



// OLD //
$body = new ArrayOfElements();

// retrieve all exercise directories and store them in an ordered array
$exerciseCount = count( glob("old-exercises/*", GLOB_ONLYDIR));
$allDirs = scandir("old-exercises", SCANDIR_SORT_DESCENDING);
$exerciseDirs = array_reverse(array_diff($allDirs, array('.', '..')), FALSE);
$refs = [];
for ($i = 0; $i < $exerciseCount; $i++)
    $refs[$i] = 'old-exercises\\' . $exerciseDirs[$i] . '\\exercises-' . ($i + 1) . '.php';

// test dropdown

// OLD //



// styles
$style = new Style();
$style->addModifiers(Config::BodyCSS());
$style->addModifiers(Config::NavbarCSS());

// elements
$newBody = new ArrayOfElements();
$navbar = new NavBar(new ArrayOfDropdowns([
        new Dropdown('xdxdxdxdx', ['uwu', 'lmaos'], ['#', '#']),
        new Dropdown('uwu', ['brainpower', 'dindong'], ['#', '#']),
        new Dropdown('math', ['rule 34', 'feet'], ['#', '#'])
    ])
);

$testTree = new Tree('Exercises');

$newBody[] = $navbar;
// html make
Html::make('PAPI - Daniel GM', $newBody, $style);

//scanNewExercises();

print("<pre>".print_r($_SERVER, true)."</pre>");

function scanNewExercises() {
    $unitsCount = count(glob("exercises/*", GLOB_ONLYDIR));
    $allDirNames = scandir("exercises", SCANDIR_SORT_DESCENDING);
    $unitDirNames = array_reverse(array_diff($allDirNames, array('.', '..')), FALSE);
    $exercises = [];
    $exercisesRefs = [];
    
    foreach ($unitDirNames as $unitDir) {
        echo $unitDir . "\n";
        $allUnit1Dirs = scandir($_SERVER['REQUEST_URI'] . 'exercises/' . $unitDir, SCANDIR_SORT_DESCENDING);
    }
}

?>