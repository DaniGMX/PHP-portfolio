<?php

class Web {

    private static $css;
    private static $body;
    
    private static $navbar;
    private static $dropdowns;
    private static $tree;
    
    public static $root;
    public static $contents;
    public static $fileContents = [];
    
    private const EXERCISES = 'Exercises';

    public static function make(string $webTitle, $unit = null, $exercise = null) {
        // make the CSS styles
        Web::$css = new Style();
        Web::$css->addModifiers(Config::BodyCSS());
        Web::$css->addModifiers(Config::NavBarCSS());
        Web::$css->addModifiers(Config::TreeCSS());
        Web::$css->addModifiers(Config::ContentsCSS());

        // make the root
        Web::$root = new Dir(Web::EXERCISES, str_replace(array('index.php', '?'), '', Tree::Root() . Tree::Uri()) . (Web::EXERCISES));
        
        // make the navigation bar
        Web::$dropdowns = new ArrayOfDropdowns();
        foreach(Web::$root->directories as $name => $unit) {
            $refs = [];
            $i = 1;
            foreach ($unit->directories as $exercise) {
                $exerciseFile = $exercise->findFile('exercise' . $i . '.php');
                $req =
                    'index.php?' .
                    'unit=' . str_replace('.php', '', str_replace('Unit', '', $unit->name)) . '&' .
                    'exercise=' . str_replace('.php', '', str_replace('Exercise', '', $exercise->name)) . '&' .
                    'path=' . str_replace([Tree::Root(), Tree::Uri()], '', $exerciseFile->path);
                $refs[] = $req;
                Web::$fileContents[$exerciseFile->path] = $exerciseFile->getContents();
                //echo $exerciseFile->path;
                $i++;
            }
            Web::$dropdowns[] = new Dropdown($name, $unit->getSubDirNames(), $refs);
        }
        Web::$navbar = new NavBar(Web::$dropdowns);

        //var_dump(Web::$fileContents);
        
        // make the tree from the Dir
        Web::$tree = new Tree(Web::$root);

        // make the content area
        $newContents = null;
        if (isset($_GET['unit']) && isset($_GET['exercise']) && isset($_GET['path'])) {
            $newContents = Web::loadExercise($_GET['unit'], $_GET['exercise'], $_GET['path']);
        }
        Web::$contents = $newContents ? $newContents : new Contents('Click on a file to see its contents!');

        // make the body elements
        Web::$body = new ArrayOfElements();
        Web::$body[] = Web::$navbar;
        Web::$body[] = Web::$tree;
        Web::$body[] = Web::$contents;

        // make the page
        return (new Html($webTitle, Web::$body, Web::$css))->htmlStr;
    }

    private static function loadExercise($unit, $exercise, $path) {
        $str = Web::$fileContents[Tree::Uri() . $path];
        return new Contents($str);
    }
}




?>