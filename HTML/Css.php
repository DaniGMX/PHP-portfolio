<?php

class Css {
    // Properties
    private CssType $type;
    private array $styles;
    
}

class CssType extends Enumerator {
    const TO_ELEMENT = '';
    const TO_ID = '#';
    const TO_CLASS = '.';
}

?>