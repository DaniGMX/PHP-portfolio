<?php

include_once './HTML/Html.php';
include_once './HTML/Css.php';
include_once './HTML/Element.php';
include_once './HTML/Modifier.php';
include_once './HTML/customs/NavBar.php';
include_once './HTML/customs/Dropdown.php';

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
$css = new Css();
$css->addModifiers(Config::BodyCSS());
$css->addModifiers(Config::NavbarCSS());

// elements
$newBody = new ArrayOfElements();
$navbar = new NavBar(new ArrayOfDropdowns([
        new Dropdown('caca', ['caquita', 'lmaos'], ['#', '#']),
        new Dropdown('aaaee', ['brainpower', 'dindong'], ['#', '#']),
        new Dropdown('math', ['rule 34', 'feet'], ['#', '#'])
    ])
);

$newBody[] = $navbar;
// html make
Html::make('PAPI - Daniel GM', $newBody, $css);

print("<pre>".print_r($_SERVER, true)."</pre>");

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
