<?php

class File extends Route{
    public function __construct(string $name, string $path, Route $parent = null)
    {
        parent::__construct($name, $path, $parent);
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