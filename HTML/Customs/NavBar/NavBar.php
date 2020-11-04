<?php

class NavBar extends Element {

    private const CLASS_NAME = "navbar";
    private const TAG_NAME = 'ul';

    public function __construct(ArrayOfDropdowns $dropdowns)
    {
        parent::__construct(NavBar::TAG_NAME, '', ['class' => NavBar::CLASS_NAME]);
        $this->appendChildren(new ArrayOfElements($dropdowns));
    }
}

?>