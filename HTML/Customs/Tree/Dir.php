<?php

class Dir extends Route{

    //Attributes
    public $directories = [];
    public $files = [];

    // Initialization
    public function __construct(string $name, string $path, Dir $parent = null)
    {
        // Call the parent's constructor to mae the route
        parent::__construct($name, $path, $parent);
        //echo 'New DIR found at:   ' . $this->path .  "<br>";

        // initialize the arrays of Dirs and Files
        $this->directories = new ArrayOfDirs();
        $this->files = new ArrayOfFiles();

        // Scan the subroutes
        $this->scan();
    }

    private function scan() {
        // scan the current directory and take out the current and parent directories
        $allRoutes = scandir($this->path, SCANDIR_SORT_DESCENDING);
        $subRoutes = array_reverse(array_diff($allRoutes, array('.', '..')));

        // traverse the found routes and add them either to the dirs or files, respectively
        foreach ($subRoutes as $subRoute) {
            $subRoutePath = $this->path . '/' . $subRoute;
            if (is_dir($subRoutePath)) {
                $this->directories[$subRoute] = new Dir($subRoute, $subRoutePath, $this);
            } else {
                $this->files[$subRoute] = new File($subRoute, $subRoutePath, $this);
            }
        }
    }

    public function getSubDirNames() {
        $names = [];
        foreach ($this->directories as $directory) 
            $names[] = $directory->name;
        return $names;
    }

    public function findFile(string $fileName) {
        $found = null;
        foreach ($this->files as $file) {
            if ($file->name == $fileName)
                $found = $file;
        }
        if ($found != null) return $found;
        foreach ($this->directories as $subDirectory) {
            $found = $subDirectory->findfile($fileName);
        }
        return $found;
    }

    public function hasFile(string $fileName) {
        foreach ($this->files as $file) {
            if ($file->name == $fileName)
                return $file;
        }
        return null;
    }
}


/**
 * Array Of Dirs class ensure these kind of arrays to hold
 * arrays that only contain Elements.
 */
class ArrayOfDirs extends ArrayObject {
    public function offsetSet($key, $val) {
        if ($val instanceof Dir) {
            return parent::offsetSet($key, $val);
        }
        throw new InvalidArgumentException('Value must be an Dir');
    }
}
