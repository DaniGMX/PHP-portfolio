<?php

include 'Config.php';

class Html {

    // Attributes
    private static $html;

    public static function make(string $title, ArrayOfElements $bodyElements) {
        Html::$html = new Element('html');

        $title = new Element('title', $title);

        $head = new Element('head');
        $head->appendChild($title);

        $style = new Element('style', '', ['href' => '.././CSS/index.css']);
        $head->appendChild($style);

        $body = new Element('body');
        $body->addStyles(Config::body());
        $body->appendChildren($bodyElements);

        Html::$html->appendChild($head);
        Html::$html->appendChild($body);

        Html::$html->echo();
    }
}

?>