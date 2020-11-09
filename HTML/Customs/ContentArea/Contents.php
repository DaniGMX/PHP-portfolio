<?php

class Contents extends Element {

    private $resource;
    
    public function __construct($resource)
    {
        parent::__construct('div', '', ['class' => 'contents']);
        $this->resource = $resource;
    }

}

?>