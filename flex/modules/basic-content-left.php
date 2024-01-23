<?php
$offset = get_sub_field('offset');
$color = get_sub_field('background_color');

?>


<section class="bg-color__<?php echo $color; ?> basic-content-left <?php the_sub_field('class') ?>" data-module="basic">
    <div class="post-content container">
        <div>
            <?php the_sub_field('content'); ?>
        </div>

        <?php $columns = get_sub_field('columns');
        if ($columns) : ?>
            <div class="d-flex justify-content-between basic-content-left__columns">
                <?php foreach ($columns as $columns) {
                    echo '<div>';
                    echo "<p><strong> {$columns['header']} </strong></p>";
                    echo "<p>{$columns['list']} </p>";
                    echo '</div>';
                }
                ?>
            </div>
        <?php endif; ?>
    </div><!-- container -->
</section>