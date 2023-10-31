<?php

require '../head.php';
require '../views/header.view.php';
require '../views/left-sidebar.view.php';

?>

<div id="content" class="content">
    <div class="admin-post">
        <h2 class="admin-post-title">Panel de Control</h2>
        <div class="admin-btns flex-r f-al-cent">
            <a href="new.php" class="btn new-btn">Nuevo Post</a>
            <a href="logout.php" class="btn logout-btn">Cerrar Sesión</a>
        </div>
        <hr class="post-separator">
    </div>

    <?php foreach($posts as $post): ?>

        <div class="admin-post">
            <h2 class="admin-post-title"><?php echo $post['id'] . '. ' . $post['title'] ?></h2>
            
            <div class="admin-btns flex-r f-al-cent">
                <a class="btn admin-function" href="edit.php?id=<?php echo $post['id'] ?>">Editar</a>
                <a class="btn admin-function" href="../single.php?id=<?php echo $post['id'] ?>">Ver</a>
                <a class="btn admin-function" href="delete.php?id=<?php echo $post['id'] ?>">Eliminar</a>
            </div>

            <hr class="post-separator">
        </div>

    <?php endforeach ?>

    <?php require '../paginacion.php' ?>

</div>

<?php

require '../views/right-sidebar.view.php';
require '../views/footer.view.php';

?>