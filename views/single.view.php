<?php 

require 'head.php';
require 'header.view.php';
require 'left-sidebar.view.php';
require 'vendor/autoload.php';

use League\CommonMark\GithubFlavoredMarkdownConverter;

$converter = new GithubFlavoredMarkdownConverter([
    'html_input' => 'allow',
    'allow_unsafe_links' => false,
]);

?>

<div id="content" class="content">

    <div class="single-post">

        <p class="listed-post-date"><?php echo post_date($post['date']); ?></p>
        <h1 class="listed-post-title"><?php echo $post['title'] ?></h1>
        <h2 class="listed-post-subtitle"><?php echo $post['subtitle'] ?></h2>
        <img class="single-post-thumb" src="<?php echo URL ?>/images/<?php echo $post['thumb'] ?>" alt="<?php echo $post['title'] ?>">
        <div class="single-content"><?php echo $converter->convert($post['content']) ?></div>

    </div>

</div>

<?php

require 'right-sidebar.view.php';
require 'footer.view.php';

?>