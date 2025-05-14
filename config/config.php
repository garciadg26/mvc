<?php

    //OBTENEMOS LA LONGITUD DE LA CADENA DE TEXTO DEL DOMINIO
    $folderPath = dirname($_SERVER['SCRIPT_NAME']);
    //OBTENEMOS LA DIRECCIN URL
    $urlPath = $_SERVER['REQUEST_URI'];
    //OBTENEMOS LA URL SIN EL DOMINIO
    $url = substr($urlPath, strlen($folderPath));

    //DECLARAMOS UNA CONSTANTE GLOBAL
    define('URL', $url);
    
?>