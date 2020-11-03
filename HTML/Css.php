<?php

include_once 'Element.php';

class Css extends Element{

    private $modifiers;

    public function __construct(array $modifiers = [])
    {
        $this->modifiers = $modifiers;

        $this->tag = 'style';
        $this->children = [];
        $this->attributes = [];
        $this->styles = [];
        $this->content = '';
    }

    public function addModifier(Modifier $newModifier) {
        $this->modifiers[] = $newModifier;
        $this->stringifiedModifiers();
        return $this;
    }

    public function addModifiers(ArrayOfModifiers $newModifiers) {
        foreach ($newModifiers as $modifier)
            $this->addModifier($modifier);
        return $this;
    }

    private function stringifiedModifiers() {
        $str = "\n";
        foreach($this->modifiers as $modifier) {
            $str .= $modifier->to . " {\n";
            foreach($modifier->modifiers as $name => $value) {
                $str .= "\t" .$name . ': ' . $value . ";\n";
            }
            $str .= "}\n";
        }
        $this->contents = $str;

        return $this->contents;
    }

    public function stringify() {
        $str = '' .
            $this->tag() .
            $this->contents .
            $this->endTag();
        return $str;
    }

    public function tag() {
        $str = '<' . $this->tag;
        $str .= '>';

        return $str;
    }

    public function endTag() {
        return '</' . $this->tag . '>';
    }

}

?>