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
            'margin' => '0px'
        );
    }

    public static function navBarAEvents() {
        return array(
            'onmouseover' => 'this.style.background-color:\'red\'; this.style.color:\'black\''
        );
    }

    public static function navBarAStyle() {
        return array(
            'float' => 'left',
            'font-size' => '16px',
            'color' => 'white',
            'text-align' => 'center',
            'padding' => '14px',
            'text-decoration' => 'none'
        );
    }
}

?>