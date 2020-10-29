<?php

/**
 * Style class that contains all the CSS Styles pertinent in the HTML document
 */
class CSStyle {

    private static $styles = [];
    
    /**
     * Add a styles to the CSStyle pool of styles
     */
    public static function addStyles(array $args = []) {
        echo count($args);
        foreach ($args as $tag => $style) {
            echo $tag;
            CSStyle::$styles[$tag] = $style;
        }
    }

    /**
     * Echoes the stored styles in the HTML
     */
    public static function style() {
        $str = '<style>';
        foreach(CSStyle::$styles as $tag => $cssStyle) {
            $str .= CSStyle::toCSS($tag, $cssStyle);
        }
        return $str . '</style>';
    }

    private static function toCSS($tag, $styles = []) {
        $cssStr = '';
        $cssStr .= "{$tag}" . "{";
        foreach($styles as $type => $value) {
            $cssStr .= "{$type}:{$value};";
        }
        $cssStr .= "}";
        return $cssStr;
    }
}

// Example of how $styles in CSStyle should store styles
$styless = [
    'h1' => [
        'background-color' => 'white',
        'font-size' => '24px'
    ],
    'body' => [
        'background-color' => 'purple',
        'font-family' => 'verdana'
    ]
]

?>