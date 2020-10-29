
<?php

include 'style.php';
include 'HTML/Element.php';

class HTML {

    public static function title(string $title, $atts = []) {
        $attsStr = HTML::stylify($atts);
        //$style = CSStyle::addStyles($styles);
        echo "<html><head><title>" . $title . "</title>". CSStyle::style() . "</head><body{$attsStr}>";
    }

    public static function addStyle($style) {
        
    }

    private static function style() {
        echo "<style>";

        echo 'body {
            background-color:white;
        }
        ';

        echo "</style>";
    }

    public static function startBody() {}

    public static function append(string $element) {
        echo $element;
    }

    public static function appendElement(Element $element) {
        $element->echo();
    }

    public static function ending() {
        echo "</body></html>";
    }

    /**
     * Makes a desired HTML element
     * 
     * @param $type     The element type (i.e. h1, div, p, li...)
     * @param $atts     Array of attributes to add to the element (i.e. style, href...)
     * @param $content  Array of contents to add to the element (i.e. other elements, plain text...)
     */
    public static function makeElement($type, $content, $atts = []) {
        $children = gettype($content) === 'array' ?
            map_html($content, function ($el) {
                return $el;
            }) :
            $content;
        assert(gettype($children) === 'string', "Content should be an array or a string");
        
        $attsStr = HTML::stylify($atts);
        
        $str = "<{$type}{$attsStr}>{$children}</{$type}>";
        return $str;
    }

    public static function separate($percent = 80) {
        echo "<hr style=\"width:${percent}%;text-align:left;margin-left:0\">";
    }

    private static function stylify($atts) {
        $attsStr = ' ';
        foreach ($atts as $att => $val) {
            $attsStr .= "{$att}=\"{$val}\"";
        }
        return $attsStr;
    }
}

function map_html($arr, $callback)
{
    $str = "";
    foreach ($arr as $element) {
        $str .= $callback($element);
    }
    return $str;
}


?>