<?php session_start();

require 'config.php';
require '../functions.php';

checkSession();

$connection = connection($bd_config);

if (!$connection) {
    header('Location: ../error.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = sanitizeInput($_POST['title']);
    $subtitle = sanitizeInput($_POST['subtitle']);
    $content = $_POST['content'];
    $thumb = $_FILES['thumb']['tmp_name'];

    $uploaded_file = '../' . $blog_config['img_folder'] . $_FILES['thumb']['name'];

    move_uploaded_file($thumb, $uploaded_file);

    $stmt = $connection->prepare(
        'INSERT INTO articles (id, title, subtitle, content, thumb)
        VALUES (null, :title, :subtitle, :content, :thumb)'
    );

    $stmt->execute([
        'title' => $title,
        'subtitle' => $subtitle,
        'content' => $content,
        'thumb' => $_FILES['thumb']['name']
    ]);
    
    header('Location: '. URL . '/admin');
}

require '../views/new.view.php';