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

// test NavBar
$navBar = new NavBar($exerciseDirs, $refs);

// test dropdown

$dropdownTest = new Dropdown('Dropdown test', ['Element 1', 'Element 2'], ['#', '#']);
$navBar->appendChild($dropdownTest);
$body[] = $navBar;

$pageHeading = new Element('h1', "PAPI 20/21 - Daniel Gracia Machado");
$body[] = $pageHeading;

// OLD //



// styles
$css = new Css();
$css->addModifiers(
    new ArrayOfModifiers([
        new Modifier('body', [
            'font-family' => 'verdana',
            'font-size' => '18px',
            'margin' => '0',
            'padding' => '0'
        ]),
        new Modifier('ul', [
            'list-style-type' => 'none',
            'margin' => '0',
            'padding' => '0',
            'overflow' => 'hidden',
            'background-color' => '#333'
        ]),
        new modifier('li', [
            'float' => 'left'
        ]),
        new Modifier('li a, .dropbtn', [
            'display' => 'inline-block',
            'color' => 'white',
            'text-align' => 'center',
            'padding' => '14px 16px',
            'text-decoration' => 'none'
        ]),
        new modifier('li a:hover, .dropdown:hover .dropbtn', [
            'background-color' => 'purple'
        ]),
        new modifier('li .dropdown', [
            'display' => 'inline-block'
        ]),
        new modifier('.dropdown-content', [
            'display' => 'none',
            'position' => 'absolute',
            'background-color' => '#f9f9f9',
            'min-width' => '160px',
            'box-shadow' => '0px 8px 16px 0px rgba(0,0,0,0.2)',
            'z-index' => '1'
        ]),
        new modifier('.dropdown-content a', [
            'color' => 'black',
            'padding' => '12px 16px',
            'text-decoration' => 'none',
            'display' => 'block',
            'text-align' => 'left'
        ]),
        new modifier('.dropdown-content a:hover', [
            'background-color' => '#deafe3',
            'color' => 'white'
        ]),
        new modifier('.dropdown:hover .dropdown-content', [
            'display' => 'block'
        ]),
    ])
);

// elements
$newBody = new ArrayOfElements();
$navbar = new Element('ul', '', ['class' => 'navbar']);
$navbar->appendChildren(
    new ArrayOfElements([
        (new Element('li', '', ['href' => '#']))->appendChild(new Element('a', 'Home', ['href' => '#home'])),
        (new Element('li', '', ['href' => '#']))->appendChild(new Element('a', 'News', ['href' => '#news'])),
        (new Element('li', '', ['class' => 'dropdown']))->appendChildren(new ArrayOfElements([
            new Element('a', 'Dropdown', ['href' => '#news']),
            (new Element('div', '', ['class' => 'dropdown-content']))->appendChildren(new ArrayOfElements([
                new Element('a', 'Link 1', ['href' => '#']),
                new Element('a', 'Link 2', ['href' => '#']),
                new Element('a', 'Link 3', ['href' => '#'])])
            )]),
        ),
    ])
);

$newBody[] = $navbar;
// html make
Html::make('PAPI - Daniel GM', $newBody, $css);

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
