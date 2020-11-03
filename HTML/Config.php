<?php

class Config {

    public static function body() {
        return array(
            'font-family' => 'verdana',
            'font-size' => '18px',
            'margin' => '0',
            'padding' => '0'
        );
    }

    public static function navBarStyle() {
        return array(
            'overflow' => 'hidden',
            'background-color' => '#333',
        );
    }

    public static function navBarAEvents() {
        return array(
            'onmouseover' => 'this.style=\'background-color:red; color:black\'',
            'onmouseleave' => 'this.style=\'background-color:red; color:black' .
            'float:left' .
            'font-size:16px' .
            'color:white' .
            'text-align:center' .
            'padding:14px 16px' .
            'text-decoration:none\''
        );
    }

    public static function navBarAStyle() {
        return array(
            'float' => 'left',
            'font-size' => '16px',
            'color' => 'white',
            'text-align' => 'center',
            'padding' => '14px 16px',
            'text-decoration' => 'none'
        );
    }

    public static function DropdownStyle() {
        return array(
            'float' => 'left',
            'overflo' => 'hidden'
        );
    }

    public static function DropdownButtonStyle() {
        return array(
            'font-size' => '16px',
            'border' => 'none',
            'outline' => 'none',
            'color' => 'white',
            'padding' => '14px 16px',
            'background-color' => 'inherit',
            'font-family' => 'inherit',
            'margin' => '0',
        );
    }
    
    public static function DropdownContent() {
        return array(
            'display' => 'none',
            'position' => 'absolute',
            'background-color' => '#f9f9f9',
            'min-width' => '160px',
            'box-shadow' => '0px 8px 16px 0px rgba(0,0,0,0.2)',
            'z-index' => '1'
        );
    }

    public static function DropdownContentA() {
        return array(
            'float' => 'none',
            'color' => 'black',
            'padding' => '12px 16px',
            'text-decoration' => 'none',
            'display' => 'block',
            'text-align' => 'left'
        );
    }

    public static function DropdownContentOnClick() {

    }

}

?>