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

<div class="content">

    <?php foreach($posts as $post): ?>

        <div class="listed-post">

            <a class="listed-post-link" href="single.php?id=<?php echo $post['id'] ?>">
                <p class="listed-post-date"><?php echo post_date($post['date']) ?></p>
                <h1 class="listed-post-title"><?php echo $post['title'] ?></h1>
                <h2 class="listed-post-subtitle"><?php echo $post['subtitle'] ?></h2>
                <img class="listed-post-thumb" src="<?php echo URL ?>/images/<?php echo $post['thumb'] ?>" alt="<?php echo $post['title'] ?>">
            </a>
            <div class="listed-post-extract"><?php echo mb_strimwidth($converter->convert($post['content']), 0, 240, "...") ?></div>
            <a href="single.php?id=<?php echo $post['id'] ?>" class="continue">Continuar leyendo...</a>
            <hr class="post-separator">

        </div>

    <?php endforeach ?>

    <?php require 'paginacion.php' ?>

</div>

<?php

require 'right-sidebar.view.php';
require 'footer.view.php';

?>