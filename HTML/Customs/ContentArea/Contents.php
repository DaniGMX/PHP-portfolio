<?php

class Contents extends Element {

    private $resource;
    
    public function __construct($newContent)
    {
        parent::__construct('div', '', ['class' => 'contents']);
        $this->appendChild(
            new Element('pre', $newContent)
        );
    }

}

?>