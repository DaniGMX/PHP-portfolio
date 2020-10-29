<?php

class File {
    
}

/**
 * Array Of File class ensure these kind of arrays to hold
 * arrays that only contain Files.
 */
class ArrayOfFiles extends ArrayObject {
    public function offsetSet($key, $val) {
        if ($val instanceof File) {
            return parent::offsetSet($key, $val);
        }
        throw new InvalidArgumentException('Value must be a File');
    }
}

?>