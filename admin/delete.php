<?php session_start();

require 'config.php';
require '../functions.php';

checkSession();

$connection = connection($bd_config);

if (!$connection) {
    header('Location: ../error.php');
}

$id = sanitizeInput($_GET['id']);

if (!$id) {
    header('Location: ' . URL . '/admin');
}

$stmt = $connection->prepare('DELETE FROM articles WHERE id = :id');
$stmt->execute(['id' => $id]);

header('Location: ' . URL . '/admin');