<?php

class Tree {
    public $rootNode;

    public function __construct(string $path = '')
    {
        $rootNode = new TreeNode($_SERVER['DOCUMENT_ROOT'] . $_SERVER['REQUEST_URI'] . $path . '/');
    }
}

class TreeNode {
    public $path;
    public $fullPath;

    public $parent;

    public $directories = [];
    public $files = [];

    private $nDirs = 0;
    private $nFiles = 0;

    public function __construct(string $path, TreeNode $parent = null)
    {
        $this->parent = $parent;
        $this->directories = new ArrayOfTreeNodes();
        $this->path = $path;
        echo $this->path .  "<br>";
        $all = scandir($path, SCANDIR_SORT_DESCENDING);
        $filesAndDirsNames = array_reverse(array_diff($all, array('.', '..')));
        foreach($filesAndDirsNames as $i => $possibleDirName) {
            $dirPath = $path . $possibleDirName;
            if (is_dir($dirPath)) {
                $this->directories[] = new TreeNode($dirPath . '/', $this);
                $this->nDirs++;
            }
            else {
                $this->files[] = $dirPath;
                echo $this->files[$i] . "<br>";
            }
        }
    }
}


/**
 * Array Of TreeNodes class ensure these kind of arrays to hold
 * arrays that only contain Elements.
 */
class ArrayOfTreeNodes extends ArrayObject {
    public function offsetSet($key, $val) {
        if ($val instanceof TreeNode) {
            return parent::offsetSet($key, $val);
        }
        throw new InvalidArgumentException('Value must be an TreeNode');
    }
}

?>