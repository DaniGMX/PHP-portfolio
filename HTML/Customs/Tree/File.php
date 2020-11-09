<?php

class File extends Route{

    private $content;

    public function __construct(string $name, string $path, Route $parent = null)
    {
        parent::__construct($name, $path, $parent);
        $this->readFile();
    }

    private function readFile() {
        $this->content = htmlspecialchars(file_get_contents($this->path));
        //var_dump($this->content);
    }

    public function getContents() {
        return $this->content;
    }
}

/**
 * Array Of Files class ensure these kind of arrays to hold
 * arrays that only contain Elements.
 */
class ArrayOfFiles extends ArrayObject {
    public function offsetSet($key, $val) {
        if ($val instanceof File) {
            return parent::offsetSet($key, $val);
        }
        throw new InvalidArgumentException('Value must be an File');
    }
}

?>