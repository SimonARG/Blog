<?php

require 'admin/config.php';
require 'functions.php';

$connection = connection($bd_config);

if (!$connection) {
    header('Location: error.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['search'])) {
    $search = sanitizeInput($_GET['search']);

    $stmt = $connection->prepare(
        'SELECT * FROM articles WHERE title LIKE :search or content LIKE :search'
    );
    $stmt->execute(array(':search' => "%$search%"));
    $results = $stmt->fetchAll();

    if (empty($results)) {
        $title = 'No se encontraron posts con el resultado: ' . $search;
    } else {
        $title = 'Resultados de la busqueda: ' . $search;
    }
} else {
    header('Locaton: ' . URL . '/index.php');
}

require 'views/search.view.php';