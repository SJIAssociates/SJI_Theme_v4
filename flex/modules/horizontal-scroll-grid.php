<?php $background_image = get_sub_field( 'background_image' ); ?>

<section class="horizontal-scroll-grid desktop" style="background-image:url('<?php echo esc_url( $background_image['url'] ); ?>');">
    <div class="panel-container">
        <?php $images = get_sub_field('images'); ?>
        <div class="horizontal-scroll-grid__row-1">
        <?php if ($images) :  ?>
            <?php foreach ($images as $image) : ?>
                <img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
            <?php endforeach; ?>
        <?php endif; ?>
        </div>
        <?php $images = get_sub_field('images_2'); ?>
        <div class="horizontal-scroll-grid__row-2">
        <?php if ($images) :  ?>
            <?php foreach ($images as $image) : ?>
                <img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
            <?php endforeach; ?>
        <?php endif; ?>
        </div>
    </div>
</section>