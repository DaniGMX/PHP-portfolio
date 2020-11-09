<?php

class Tree extends Element {
    
    // Attributes
    public $root;

    // Static
    public static function Root()          { return $_SERVER['DOCUMENT_ROOT']; }
    public static function Uri()           { return $_SERVER['REQUEST_URI']; }

    public static function Path($name='')   { return Tree::Root() . Tree::Uri() . $name; }

    // Initilization
    public function __construct(Dir $root)
    {
        parent::__construct('div', '', ['class' => 'tree']);
        $this->root = $root;

        $this->appendChild($this->buildTree($this->root));
    }

    private function buildTree(Dir $dir) {
        // Make the list
        $dirUList = new Element('ul','', ['class' => 'dir']);
        $dirList = new ArrayOfElements();

        // traverse directories
        foreach ($dir->directories as $subDir) {
            $dirList[] = new Element('li', $subDir->name, ['class' => 'dir']);
            $dirList[] = $this->buildTree($subDir);
        }

        // traverse files
        foreach ($dir->files as $subFile) {
            $dirList[] = (new Element('li', ''/*$subFile->name*/, ['class' => 'file']))->appendChild(
                new Element('a', $subFile->name, ['class' => 'file', 'href' => str_replace(Tree::Root(), "", $subFile->path)])
            );
        }

        $dirUList->appendChildren($dirList);
        return $dirUList;
    }

    public function findFile(string $fileName) {
        $this->root->findFile($fileName);
    }
}

?>