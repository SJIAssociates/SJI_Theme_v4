<div class="bg-color__<?php the_sub_field('background_color') ?> basic-content-left <?php the_sub_field('class') ?>">
    <div class="post-content container">
        <div>
            <?php the_sub_field('content'); ?>
        </div>
        <?php $columns = get_sub_field('columns');
        if ($columns) : ?>
            <div class="d-flex justify-content-between basic-content-left__columns">
                <?php foreach ($columns as $columns) {
                    echo '<div>';
                    echo "<p><strong>";
                    echo $columns['header'];
                    echo "</strong></p>";
                    echo "<p>";
                    echo $columns['list'];
                    echo "</p>";
                    echo '</div>';
                }
                ?>
            </div>
        <?php endif; ?>
    </div>
</div>