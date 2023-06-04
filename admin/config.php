<?php

define('URL', 'http://localhost/Blog'); // Defines URL as a variable representing the Index's URL

$bd_config = [ // Array containing basic database informartion
    'database' => 'muerte_termica_blog',
    'user' => 'root',
    'pass' => ''
];

$blog_config = [ // Array containing information about the blog
    'posts_per_page' => '4',
    'img_folder' => 'images/'
];

$blog_admin = [ // Array containing information about the admin login
    'user' => 'admin',
    'pass' => '123'
];