<?php

class Modifier {
    public $to;
    public $modifiers;

    public function __construct($to)
    {
        $this->tag = $to;
        $this->to = $to;
    }

    public function addModifiers($modifiers) {
        foreach ($modifiers as $name => $value)
            $this->modifiers[$name] = $value;
    }

    public function stringify() {
        $str = '';
        $str .= $this->to . '{';
        foreach ($this->modifiers as $name => $value) {
            $str .= $name . ': ' . $value . ';';
        }
        return $str . '}';
    }
}

/**
 * Array Of Modifiers class ensure these kind of arrays to hold
 * arrays that only contain Elements.
 */
class ArrayOfModifiers extends ArrayObject {
    public function offsetSet($key, $val) {
        if ($val instanceof Modifier) {
            return parent::offsetSet($key, $val);
        }
        throw new InvalidArgumentException('Value must be an Modifier');
    }
}

/*



*/

?>