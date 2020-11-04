<?php

include_once 'Css.php';
include_once 'Element.php';

class Config {

    public static function BodyCSS() {
        return new ArrayOfModifiers ([
            new Modifier('body', [
                'font-family' => 'verdana',
                'font-size' => '18px',
                'margin' => '0',
                'padding' => '0'
            ]),
    ]);
    }

    public static function navBarCSS() {
        return new ArrayOfModifiers ([
            new Modifier('ul', [
                'list-style-type' => 'none',
                'margin' => '0',
                'padding' => '0',
                'overflow' => 'hidden',
                'background-color' => '#333'
            ]),
            new modifier('li', [
                'float' => 'left'
            ]),
            new Modifier('li a, .dropbtn', [
                'display' => 'inline-block',
                'color' => 'white',
                'text-align' => 'center',
                'padding' => '14px 16px',
                'text-decoration' => 'none'
            ]),
            new modifier('li a:hover, .dropdown:hover .dropbtn', [
                'background-color' => 'purple'
            ]),
            new modifier('li .dropdown', [
                'display' => 'inline-block'
            ]),
            new modifier('.dropdown-content', [
                'display' => 'none',
                'position' => 'absolute',
                'background-color' => '#f9f9f9',
                'min-width' => '160px',
                'box-shadow' => '0px 8px 16px 0px rgba(0,0,0,0.2)',
                'z-index' => '1'
            ]),
            new modifier('.dropdown-content a', [
                'color' => 'black',
                'padding' => '12px 16px',
                'text-decoration' => 'none',
                'display' => 'block',
                'text-align' => 'left'
            ]),
            new modifier('.dropdown-content a:hover', [
                'background-color' => '#deafe3',
                'color' => 'white'
            ]),
            new modifier('.dropdown:hover .dropdown-content', [
                'display' => 'block'
            ]),
        ]);
    }

}

?>