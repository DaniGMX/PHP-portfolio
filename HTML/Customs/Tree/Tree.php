<?php

class Tree {
    // Attributes
    public $root;

    // Static
    private static function Root()          { return $_SERVER['DOCUMENT_ROOT']; }
    private static function Uri()           { return $_SERVER['REQUEST_URI']; }

    public static function Path($name='')   { return Tree::Root() . Tree::Uri() . $name; }

    // Initilization
    public function __construct(Dir $root)
    {
        $this->root = $root;
    }

    public function findFile(string $fileName) {
        $this->root->findFile($fileName);
    }
}

?>