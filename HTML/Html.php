<?php

include_once 'Config.php';
include_once 'Element.php';

class Html {

    public static function make(string $title, ArrayOfElements $bodyElements, Style $css) {
        // create new html element that will hold the page
        $html = new Element('html');

        // create all the base html elements
        $headElement = new Element('head');
        $titleElement = new Element('title', $title);
        $styleElement = $css;
        $bodyElement = new Element('body');

        // create the new title element so we can insert the $title parameter
        $headElement->appendChild($titleElement);
        $headElement->appendChild($styleElement);

        $bodyElement->appendChildren($bodyElements);

        $html->appendChildren(new ArrayOfElements([$headElement, $bodyElement]));

        // echo the html
        $html->echo();
    }
}

?>