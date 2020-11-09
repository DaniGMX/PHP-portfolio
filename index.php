<?php

include_once './HTML/Customs/Web.php';
include_once './HTML/Html.php';
include_once './HTML/Element.php';
include_once './HTML/Config.php';
include_once './HTML/Styles/Style.php';
include_once './HTML/Styles/Modifier.php';
include_once './HTML/Customs/NavBar/NavBar.php';
include_once './HTML/Customs/NavBar/Dropdown.php';
include_once './HTML/Customs/Tree/Tree.php';
include_once './HTML/Customs/Tree/Route.php';
include_once './HTML/Customs/Tree/Dir.php';
include_once './HTML/Customs/Tree/File.php';
include_once './HTML/Customs/ContentArea/Contents.php';

echo Web::make('DaniGM Portfolio');

function runMyFunction() {
    echo 'I just ran a php function';
}

if (isset($_GET['hello'])) {
    runMyFunction();
}

?>