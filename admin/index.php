<?php session_start();

require 'config.php';
require '../functions.php';

$connection = connection($bd_config);

checkSession();

if (!$connection) {
    header('Location: ../error.php');
}

$posts = fetch_posts($blog_config['posts_per_page'], $connection);

require '../views/admin-index.view.php';