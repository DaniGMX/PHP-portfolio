<?php

class Element {
    
    // Properties
    private $tag;
    private $content;
    private $children;
    private $attributes;
    private $styles;

    // Initializer
    function __construct(string $tag = 'div', $content = '', $attributes = [], $styles = [])
    {
        $this->tag = $tag;
        $this->children = new ArrayOfElements();
        $this->content = $content;
        $this->attributes = $attributes;
        $this->styles = $styles;
    }

    // Methods

    /**
     * Appends a child Element to this Element
     * @param   Element $newChild   Element to append to this Element
     */
    public function appendChild(Element $newChild) {
        $this->children[] = $newChild;
        return $this;
    }

    /**
     * Appends an array of Elements to this Element
     * @param   ArrayOfElements $newChildren Array of children to append to this Element
     */
    public function appendChildren(ArrayOfElements $newChildren) {
        foreach($newChildren as $newChild)
            $this->appendChild($newChild);
        return $this;
    }

    /**
     * Adds a new attribute to this Element
     * @param   string $name    Name of the attribute to add
     * @param   string $value   Value of the given attribute
     */
    public function addAttribute($name, $value) {
        if ($name != 'style')
            $this->attributes[$name] = $value;
        else
            throw new Exception('style attribute must be added separately!');
    }

    /**
     * Adds several attributes to this Element
     * @param   array $attributes   Array of [name => value] attributes to add to the Element
     */
    public function addAttributes($attributes) {
        foreach ($attributes as $name => $value)
            $this->addAttribute($name, $value);
    }

    /**
     * Adds a new style to this Element
     * @param   string $name    Name of the style to add
     * @param   string $value   Value of the given style
     */
    public function addStyle($name, $value) {
        $this->styles[$name] = $value;
    }

    /**
     * Adds several styles to this Element
     * @param   array[string] $styles   Array of [name => value] styles to add to the Element
     */
    public function addStyles($styles) {
        foreach ($styles as $name => $value) {
            $this->addStyle($name, $value);
        }
    }

    public function makeClassCss($of = '') {
        if (!empty($of)) {
            if ($this->hasChildOfElement($of)) {

            }
        }
        else
            throw new Exception("element does't belong to any class, class required");
    }

    public function makeIdCss ($of = '') {

    }

    public function getTag() {
        return $this->tag;
    }

    public function getAttributes() {
        return $this->attributes;
    }

    /**
     * Echoes this Element instance into the HTML
     */
    public function echo() {
        echo $this->stringify();
    }


    // Private Methods

    private function hasChildOfElement($tag) {
        foreach ($this->children as $child) {
            if ($child->getTag() == $tag)
                return true;
        }
        return false;
    }

    private function hasChildOf($classOrId, $name) {
        if ($classOrId)
            foreach ($this->children as $child) {
                if ($child->hasAttribute($classOrId))
                    return true;
            }
            return false;
    }

    private function hasAttribute($needle) {
        return in_array($needle, $this->attributes);
    }

    /**
     * Converts this Element's data to an echoable string
     * @return  string Stringified Element
     */
    private function stringify() {
        $str = '' .
            $this->tag() .
            $this->content .
            $this->stringifiedChildren() .
            $this->endTag();
        return $str;
    }

    /**
     * Converts all the children to a string
     * @return  string Stringified children of this Element
     */
    private function stringifiedChildren() {
        $childrenStr = '';
        foreach($this->children as $child)
            $childrenStr .= $child->stringify();
        return $childrenStr;
    }

    /**
     * Converts all the attributes to a string
     * @return  string Stringified attributes of this Element
     */
    private function stringifiedAttributes() {
        $attStr = '';
        foreach ($this->attributes as $attr => $val)
            $attStr .= " {$attr}=\"{$val}\"";
        return $attStr;
    }

    /**
     * Converts all the styles to a string
     * @return  string Stringified styles of this Element
     */
    private function stringifiedStyles() {
        $styleStr = ' style="';
        foreach ($this->styles as $attr => $val)
            $styleStr .= "{$attr}:{$val};";
        return $styleStr . '"';
    }

    /**
     * Sets the tag with all the attributes
     * @return  string Full tag of this Element
     */
    private function tag() {
        $str = '<' . $this->tag;
        if (!empty($this->attributes)) $str .= $this->stringifiedAttributes();
        if (!empty($this->styles)) $str .= $this->stringifiedStyles();
        $str .= '>';

        return $str;
    }

    /**
     * Sets the ending tag
     * @return  string Ending tag of this element
     */
    private function endTag() {
        return '</' . $this->tag . '>';
    }
}

/**
 * Array Of Elements class ensure these kind of arrays to hold
 * arrays that only contain Elements.
 */
class ArrayOfElements extends ArrayObject {
    public function offsetSet($key, $val) {
        if ($val instanceof Element) {
            return parent::offsetSet($key, $val);
        }
        throw new InvalidArgumentException('Value must be an Element');
    }
}

?>