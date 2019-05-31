<?php 
    $directoryURI = $_SERVER['REQUEST_URI'];
    $path = parse_url($directoryURI, PHP_URL_PATH);
    $components = explode('/', $path);
    if (array_key_exists(2, $components)) {
        $url = $components[2];
    } else {
        $url = "";
    }
    $sub_url = $components[1];
?>