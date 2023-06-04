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
    $id = sanitizeInput($_POST['id']);
    $saved_thumb = $_POST['saved-thumb'];
    $thumb = $_FILES['thumb'];

    if (empty($thumb['name'])) {
        $thumb = $saved_thumb;
    } else {
        $uploaded_file = '../' . $blog_config['img_folder'] . $_FILES['thumb']['name'];
        move_uploaded_file($_FILES['thumb']['tmp_name'], $uploaded_file);
        $thumb = $_FILES['thumb']['name'];
    }

    $stmt = $connection->prepare(
        'UPDATE articles SET title = :title, subtitle = :subtitle, content = :content, thumb = :thumb WHERE id = :id'
    );

    $stmt->execute([
        'title' => $title,
        'subtitle' => $subtitle,
        'content' => $content,
        'thumb' => $thumb,
        'id' => $id
    ]);

    header('Location: ' . URL . '/admin');
} else {
    $post_id = post_id($_GET['id']);

    if (empty($post_id)) {
        header('Location: ' . URL . '/admin');
    }

    $post = fetch_post_by_id($connection, $post_id);

    if (!$post) {
        header('Location: ' . URL . '/admin');
    }

    $post = $post['0'];
}

require '../views/edit.view.php';