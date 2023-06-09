<?php

require 'admin/config.php';
require 'functions.php';

$connection = connection($bd_config);

if (!$connection) {
    header('Location: error.php');
}

$posts = fetch_posts($blog_config['posts_per_page'], $connection);

if (!$posts) {
    header('Location: error.php');
}

require 'views/index.view.php';