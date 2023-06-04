<?php $page_count = page_count($blog_config['posts_per_page'], $connection) ?>

<section class="paginacion">

    <ul>
        <?php if (current_page() === 1): ?>
            <li class="disabled">&laquo;</li>
        <?php else: ?>
            <a href="index.php?p=<?php echo current_page() -1 ?>"><li>&laquo;</li></a>
        <?php endif ?>

        <?php for($i = 1; $i <= $page_count; $i++): ?>
            <?php if (current_page() === $i): ?>
                <li class="active">
                    <?php echo $i ?>
                </li>
            <?php else: ?>
                <a href="index.php?p=<?php echo $i ?>"><li><?php echo $i ?></li></a>
            <?php endif ?>
        <?php endfor ?>

        <?php if (current_page() == $page_count): ?>
            <li class="disabled">&raquo;</li>
        <?php else: ?>
            <a href="index.php?p=<?php echo current_page() + 1 ?>"><li>&raquo;</li></a>
        <?php endif ?>
    </ul>

</section>