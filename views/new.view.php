<?php

require '../head.php';
require '../views/header.view.php';
require '../views/left-sidebar.view.php';

?>

<div id="content" class="content">

    <div class="new-post">

        <h1 class="listed-post-title">Nuevo Post</h1>
        <form class="upload-form" autocomplete="off" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
            <input class="wide" type="text" name="title" placeholder="Título del post">
            <input class="wide" type="text" name="subtitle" placeholder="Subtítulo del post">
            <textarea class="wide" name="content" placeholder="Contenido"></textarea>
            <input type="file" name="thumb">

            <input type="submit" value="Crear Post">

        </form>

    </div>

</div>

<?php

require '../views/right-sidebar.view.php';
require '../views/footer.view.php';

?>