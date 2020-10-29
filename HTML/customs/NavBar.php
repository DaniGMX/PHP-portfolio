<?php

class NavBar extends Element {
    private $count;
    private array $elems = [];

    public function __construct($elements, $refs)
    {
        parent::__construct();
        $this->addStyles(Config::navBarStyle());
        
        foreach($elements as $index => $element)
            $this->elems[$element] = $refs[$index];
        
        $this->addAttribute('class', 'navBar');
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