<?php

class NavBar extends Element {

    public const CLASS_NAME = "nav-bar";
    public const TAG = 'div';

    private $count;
    private $elems = [];

    public function __construct($elements, $refs)
    {
        parent::__construct();
        $this->addStyles(Config::navBarStyle());
        
        foreach($elements as $index => $element)
            $this->elems[$element] = $refs[$index];
        
        $this->addAttribute('class', NavBar::CLASS_NAME);
        $this->prepareElements();
    }

    private function prepareElements() {
        foreach ($this->elems as $content => $href) {
            $newElem = new Element('a', $content, ['href' => $href]);
            $newElem->addStyles(Config::navBarAStyle());
            $newElem->addAttributes(Config::navBarAEvents());
            $this->appendChild($newElem);
        }
    }
}

?>