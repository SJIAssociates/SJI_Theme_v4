<div class="bg-color__<?php the_sub_field('background_color') ?>">
    <?php if ( get_sub_field( 'full_width' ) != 1 ) : ?>
    <div class="post-content">
        <div class="container">
    <?php else: ?>
    <div class="post-content--full">
    <?php endif; ?>
            <?php the_sub_field( 'content' ); ?>
    <?php if ( get_sub_field( 'full_width' ) != 1 ) : ?>
        </div>
    <?php endif; ?>
    </div>
</div>