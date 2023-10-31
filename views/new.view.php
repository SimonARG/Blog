<?php

require '../head.php';
require '../views/header.view.php';
require '../views/left-sidebar.view.php';

?>

<div id="content" class="content">

    <div class="new-post">

        <h1 class="listed-post-title">Nuevo Post</h1>
        <form class="upload-form fill-width flex-c f-just-cent f-al-cent" autocomplete="off" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
            <input class="fill-width fillable" type="text" name="title" placeholder="Título del post">
            <input class="fill-width fillable" type="text" name="subtitle" placeholder="Subtítulo del post">
            <textarea class="fill-width fillable" name="content" placeholder="Contenido"></textarea>
            <input type="file" name="thumb">

            <input class="btn" type="submit" value="Crear Post">

        </form>

    </div>

</div>

<?php

require '../views/right-sidebar.view.php';
require '../views/footer.view.php';

?>