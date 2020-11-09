<?php

class Config {

    public static function ContentsCSS() {
        return new ArrayOfModifiers ([
            new Modifier('div.contents', [
                'background-color' => '#1f1f1f',
                'height' => '100%',
                'width' => '75%',
                'position' => 'fixed',
                'overflow-y' => 'auto',
                'right' => '0',
            ]),
            new Modifier('ul.dir', [
                'list-style-type' => '"📁"',
                'font-size' => '14px',
            ]),
            new Modifier('li.file', [
                'list-style-type' => '"📄"',
                'font-size' => '14px',
            ]),
            new modifier('.file a:hover', [
                'color' => '#fdfdfd',
            ]),
        ]);
    }

    public static function TreeCSS() {
        return new ArrayOfModifiers ([
            new Modifier('div.tree', [
                'background-color' => '#e1aff0',
                'height' => '100%',
                'width' => '25%',
                'position' => 'fixed',
                'overflow-y' => 'auto',
                'left' => '0',
            ]),
            new Modifier('ul.dir', [
                'cursor' => 'default',
                'list-style-type' => '"📁"',
                'font-size' => '14px',
            ]),
            new Modifier('li.file', [
                'list-style-type' => '"📄"',
                'font-size' => '14px',

            ]),
            new Modifier('li a.file', [
                'display' => 'inline-block',
                'text-decoration' => 'none',
                'color' => 'black',
            ]),
        ]);
    }
    
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

    public static function NavBarCSS() {
        return new ArrayOfModifiers ([
            new Modifier('ul.navbar', [
                'list-style-type' => 'none',
                'cursor' => 'default',
                'margin' => '0',
                'padding' => '0',
                'overflow' => 'hidden',
                'background-color' => '#000'
            ]),
            new modifier('li.dropdown', [
                'float' => 'left'
            ]),
            new Modifier('li a.dropbtn', [
                'display' => 'inline-block',
                'color' => 'white',
                'text-align' => 'center',
                'padding' => '14px 16px',
                'text-decoration' => 'none'
            ]),
            new modifier('li.dropdown a:hover, .dropdown:hover .dropbtn', [
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