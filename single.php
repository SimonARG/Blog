<?php

require 'admin/config.php';
require 'functions.php';

$connection = connection($bd_config);
$post_id = post_id($_GET['id']);

if (!$connection) {
    header('Location: error.php');
}

if (empty($post_id)) {
    header('Location: index.php');
}

$post = fetch_post_by_id($connection, $post_id);

if (!$post) {
    header('Location: index.php');
}

$post = $post[0];

require 'views/single.view.php';