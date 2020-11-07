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

class Web {
    private static $css;
    private static $root;
    private static $tree;
    private static $dropdowns;
    private static $navbar;
    private static $body;
    
    private const WEB_TITLE = 'Daniel GM Portfolio';
    private const EXERCISES = 'Exercises';

    public static function make() {
        // make the CSS styles
        Web::$css = new Style();
        Web::$css->addModifiers(Config::BodyCSS());
        Web::$css->addModifiers(Config::NavBarCSS());

        // make the root and the base tree
        Web::$root = new Dir(Web::EXERCISES, Tree::Path(Web::EXERCISES));
        //Web::$tree = NEW Tree(Web::$root);

        // make the navigation bar
        Web::$dropdowns = new ArrayOfDropdowns();
        foreach(Web::$root->directories as $name => $unit) {
            $refs = [];
            $i = 1;
            foreach ($unit->directories as $exercise) {
                $exerciseFile = $exercise->findFile('exercise' . $i . '.php');
                $refs[] = $exerciseFile->path;
                $i++;
            }
            Web::$dropdowns[] = new Dropdown($name, $unit->getSubDirNames(), $refs);
        }
        Web::$navbar = new NavBar(Web::$dropdowns);

        // make the body elements
        Web::$body = new ArrayOfElements();
        Web::$body[] = Web::$navbar;

        // make the page
        Html::make(Web::WEB_TITLE, Web::$body, Web::$css);
    }
}

?>