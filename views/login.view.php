<?php

require 'head.php';
require 'header.view.php';
require 'left-sidebar.view.php';

?>

<div id="content" class="content">

    <div class="login">

        <h1 class="login-title">Iniciar Sesión</h1>
        <form class="login-form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
            <input type="text" name="user" placeholder="Usuario">
            <input type="password" name="password" placeholder="Contraseña">
            <input type="submit" value="Iniciar Sesión">
        </form>

    </div>

</div>

<?php

require 'views/right-sidebar.view.php';
require 'views/footer.view.php';

?>