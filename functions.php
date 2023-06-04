<?php

function connection($bd_config) {
    try {
        $connection = new PDO('mysql:host=localhost;dbname='.$bd_config['database'], $bd_config['user'], $bd_config['pass']);
        return $connection;
    } catch (PDOException $e) {
        return false;
    }
}

function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function current_page() {
    return isset($_GET['p']) ? (int)$_GET['p'] : 1;
}

function fetch_posts($posts_per_page, $connection) {
    $start = (current_page() > 1) ? current_page() * $posts_per_page - $posts_per_page : 0;
    $stmt = $connection->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM articles ORDER BY date DESC LIMIT $start, $posts_per_page");
    $stmt->execute();
    return $stmt->fetchAll();
}

function page_count($posts_per_page, $connection) {
    $total_posts = $connection->prepare('SELECT FOUND_ROWS() as total');
    $total_posts->execute();
    $total_posts = $total_posts->fetch()['total'];

    $page_count = ceil($total_posts / $posts_per_page);
    return $page_count;
}

function post_id($id) {
    return (int)sanitizeInput($id);
}

function fetch_post_by_id($connection, $id) {
    $result = $connection->query("SELECT * FROM articles WHERE id = $id LIMIT 1");
    $result = $result->fetchAll();
    return ($result) ? $result : false;
}

function post_date($date) {
    $timestamp = strtotime($date);
    $months = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
    'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
    $day = date('d', $timestamp);
    $month = date('m', $timestamp) - 1;
    $year = date('Y', $timestamp);

    $date = "$day de " . $months[$month] . " del $year";
    return $date;
}

function checkSession() {
    if (!isset($_SESSION['admin'])) {
        header('Location: ' . URL);
    }
}