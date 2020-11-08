<?php

include_once './HTML/Html.php';
include_once './HTML/Element.php';
include_once './HTML/Config.php';
include_once './HTML/Styles/Style.php';
include_once './HTML/Styles/Modifier.php';
include_once './HTML/Customs/NavBar/NavBar.php';
include_once './HTML/Customs/NavBar/Dropdown.php';
include_once './HTML/Customs/Tree/Tree.php';
include_once './HTML/Customs/Tree/Route.php';
include_once './HTML/Customs/Tree/Dir.php';
include_once './HTML/Customs/Tree/File.php';
include_once './HTML/Customs/Contents/Contents.php';

class Web {
    private static $css;
    private static $body;
    
    private static $navbar;
    private static $dropdowns;
    private static $root;
    private static $tree;
    private static $contents;
    
    private const WEB_TITLE = 'Daniel GM Portfolio';
    private const EXERCISES = 'Exercises';

    public static function make() {
        // make the CSS styles
        Web::$css = new Style();
        Web::$css->addModifiers(Config::BodyCSS());
        Web::$css->addModifiers(Config::NavBarCSS());
        Web::$css->addModifiers(Config::TreeCSS());

        // make the root
        Web::$root = new Dir(Web::EXERCISES, Tree::Path(Web::EXERCISES));
        
        // make the navigation bar
        Web::$dropdowns = new ArrayOfDropdowns();
        foreach(Web::$root->directories as $name => $unit) {
            $refs = [];
            $i = 1;
            foreach ($unit->directories as $exercise) {
                $exerciseFile = $exercise->findFile('exercise' . $i . '.php');
                $refs[] = str_replace(Tree::Root(), "", $exerciseFile->path);
                $i++;
            }
            Web::$dropdowns[] = new Dropdown($name, $unit->getSubDirNames(), $refs);
        }
        Web::$navbar = new NavBar(Web::$dropdowns);
        
        // make the tree from the root
        Web::$tree = new Tree(Web::$root);

        // make the body elements
        Web::$body = new ArrayOfElements();
        Web::$body[] = Web::$navbar;
        Web::$body[] = Web::$tree;

        // make the page
        Html::make(Web::WEB_TITLE, Web::$body, Web::$css);
    }
}

?>