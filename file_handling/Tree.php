<?php

include '.\customs\Directory.php';
include '.\customs\File.php';

class Tree {
    public TreeNode $root;

    public function find(string $path) {

    }

    public function put($path) {

    }
    
    public function remove($path) {

    }
}

class TreeNode {
    private string $path;
    public ArrayOfDirectories $dirs;
    public ArrayOfFiles $files;
}

?>