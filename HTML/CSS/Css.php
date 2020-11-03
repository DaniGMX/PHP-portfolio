<?php

class Css extends Element{

    private array $modifiers;

    public function __construct(array $modifiers)
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
        $str = '';
        foreach($this->modifiers as $modifier) {
            $str .= $modifier->to . " {\n";
            foreach($modifier->modifiers as $name => $value) {
                $str .= $name . ': ' . $value . ";\n";
            }
            $str .= "}\n";
        }
        $this->contents = $str . "\n";

        return $this->contents;
    }

}

?>