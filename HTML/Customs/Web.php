<?php

class Web {

    private static $css;
    private static $body;
    
    private static $navbar;
    private static $dropdowns;
    private static $root;
    private static $tree;
    private static $contents;
    private static $fileContents = [];
    
    private const EXERCISES = 'Exercises';

    public static function make(string $webTitle) {
        // make the CSS styles
        Web::$css = new Style();
        Web::$css->addModifiers(Config::BodyCSS());
        Web::$css->addModifiers(Config::NavBarCSS());
        Web::$css->addModifiers(Config::TreeCSS());
        Web::$css->addModifiers(Config::ContentsCSS());

        // make the root
        Web::$root = new Dir(Web::EXERCISES, str_replace('index.php', '', Tree::Path()) . (Web::EXERCISES));
        
        // make the navigation bar
        Web::$dropdowns = new ArrayOfDropdowns();
        foreach(Web::$root->directories as $name => $unit) {
            $refs = [];
            $i = 1;
            foreach ($unit->directories as $exercise) {
                // OLD
                $exerciseFile = $exercise->findFile('exercise' . $i . '.php');
                //$thisRef = str_replace(Tree::Path(), "", $exerciseFile->path);
                $req = str_replace(Tree::Path(), "", $exerciseFile->path);
                $refs[] = 'index.php?' . str_replace('.php', '', $unit->name . $exerciseFile->name) . '=true'; // str_replace('.php', '', $exerciseFile->name) . $reqGet;
                Web::$fileContents[$req] = $exerciseFile->getContents();
                $i++;
                // NEW gotta call change contents with href => $exercise.php . '?' . "/$unit->name . '=' . $exercise->name
            }
            Web::$dropdowns[] = new Dropdown($name, $unit->getSubDirNames(), $refs);
        }
        Web::$navbar = new NavBar(Web::$dropdowns);
        
        // make the tree from the Dir
        Web::$tree = new Tree(Web::$root);

        // make the content area
        Web::$contents = new Contents(null);

        // make the body elements
        Web::$body = new ArrayOfElements();
        Web::$body[] = Web::$navbar;
        Web::$body[] = Web::$tree;
        Web::$body[] = Web::$contents;

        // make the page
        return (new Html($webTitle, Web::$body, Web::$css))->htmlStr;
    }
}

?>