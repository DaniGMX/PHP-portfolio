<?php

include 'defines.php';

/**
 * Returns the var_dump() output as a string.
 * 
 * @param   mixed   $arg
 * @return  string  Stringyfied version of var_dump() output.
 */
function return_var_dump($arg) {
    ob_start();
    call_user_func_array('var_dump', array($arg));
    return ob_get_clean();
}

function makeExercise($heading, $solution) {
    HTML::append(
        HTML::makeElement('div', [$heading, $solution])
    );

    HTML::separate();
}

?>