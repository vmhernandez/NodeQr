<?php
    // Pequeña lógica para capturar la pagina que queremos abrir
    // El fragmento de html que contiene la cabecera de nuestra web
    $pagina = isset($_GET['p']) ? strtolower($_GET['p']) : 'login_administrador';
    require_once 'header.php';
    require_once 'inicio.php';

    /* Estamos considerando que el parámetro enviando tiene el mismo nombre del archivo a cargar, si este no fuera así
    se produciría un error de archivo no encontrado */
    // Otra opción es validar usando un switch, de esta manera para el valor esperado le indicamos que página cargar
    require_once ''. $pagina . '.php';

    // El fragmento de html que contiene el pie de página de nuestra web
    //require_once 'footer.php';