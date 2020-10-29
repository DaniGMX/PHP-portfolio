<?php

class Directory {
    
}

/**
 * Array Of Directories class ensure these kind of arrays to hold
 * arrays that only contain Directories.
 */
class ArrayOfDirectories extends ArrayObject {
    public function offsetSet($key, $val) {
        if ($val instanceof Directory) {
            return parent::offsetSet($key, $val);
        }
        throw new InvalidArgumentException('Value must be a Directory');
    }
}

?>