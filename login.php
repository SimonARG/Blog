<?php session_start();

require 'admin/config.php';
require 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = sanitizeInput($_POST['user']);
    $pass = sanitizeInput($_POST['password']);

    if ($user == $blog_admin['user'] && $pass == $blog_admin['pass']) {
        $_SESSION['admin'] = $blog_admin['user'];
        header('Location: ' . URL . '/admin');
    }
}

require 'views/login.view.php';