<?php

require '../head.php';
require '../views/header.view.php';
require '../views/left-sidebar.view.php';
require '../vendor/autoload.php';

use League\CommonMark\GithubFlavoredMarkdownConverter;

$converter = new GithubFlavoredMarkdownConverter([
    'html_input' => 'allow',
    'allow_unsafe_links' => false,
]);

?>

<div id="content" class="content">

    <div class="edit-post">

        <h1 class="listed-post-title">Editar Post</h1>
        <form class="upload-form" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
            <input type="hidden" name="id" value="<?php echo $post['id'] ?>">
            <input class="wide" type="text" name="title" value="<?php echo $post['title'] ?>">
            <input class="wide" type="text" name="subtitle" value="<?php echo $post['subtitle'] ?>">
            <textarea class="wide" name="content"><?php echo $post['content'] ?></textarea>
            <input type="file" name="thumb">
            <input type="hidden" name="saved-thumb" value="<?php echo $post['thumb'] ?>">

            <input type="submit" value="Modificar Post">
        </form>

    </div>

</div>

<?php

require '../views/right-sidebar.view.php';
require '../views/footer.view.php';

?>