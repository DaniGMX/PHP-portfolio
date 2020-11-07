<?php

class Route {
    public $parent;
    public $name;
    public $path;
    
    public function __construct(string $name, string $path, Route $parent = null)
    {
        $this->parent = $parent;
        $this->name = $name;
        $this->path = $path;
    }
}

?>