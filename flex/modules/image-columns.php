<?php $columns_images = get_sub_field( 'columns' ); ?>

<div class="image-columns bg-color__<?php the_sub_field('background_color'); ?> layout-style__<?php the_sub_field('layout_style'); ?>">
    <div class="container">
        <?php if ( $columns_images ) :  ?>
        <div class="image-columns__grid">
            <?php foreach ( $columns_images as $columns_image ): ?>
            <figure class="image-columns__column">
                <!-- <pre class="hidden"><?php //var_dump($columns_image); ?></pre> -->
                <?php echo wp_get_attachment_image($columns_image['id'], 'full') ?>
            </figure>
            <?php endforeach;?>
        </div>
        <?php endif;?>
    </div>
</div>

