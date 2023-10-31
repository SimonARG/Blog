<?php

require 'head.php';
require 'header.view.php';
require 'left-sidebar.view.php';

?>

<div class="content">
    <div class="login">
        <h1 class="login-title">Iniciar Sesión</h1>

        <form class="login-form flex-c f-al-cent f-just-cent" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
            <input type="text" class="fillable" name="user" placeholder="Usuario">
            <input type="password" class="fillable" name="password" placeholder="Contraseña">
            <input class="btn" type="submit" value="Iniciar Sesión">
        </form>
    </div>
</div>

<?php

require 'views/right-sidebar.view.php';
require 'views/footer.view.php';

?>