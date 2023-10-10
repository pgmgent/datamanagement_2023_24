<?php 

function redirect($url, $response_code = 301) {
    header("location: " . $url, true, $response_code);
    exit;
}
function displayErrors($errors = []) {
    if(isset($errors) && count($errors) > 0) {
        foreach ( $errors as $error ) {
            echo "<div class='alert alert-danger'>$error</div>";
        } 
    }
}