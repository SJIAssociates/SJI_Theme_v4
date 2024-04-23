<?php 
$videos = get_sub_field('videos');
$width = get_sub_field('width');
$color = get_sub_field('background_color');
$align = get_sub_field('align_copy');
$padding = get_sub_field('padding');
$vidoWidth = get_sub_field('column_split') ?: 'col-lg';

?>

<section class="captioned-banner <?php echo $padding; ?>"<?php if( !empty($color) ){ 
    echo "style='background-color: $color;'";
    } ?> 
    data-module="Captioned Video">
    <div class="<?php echo $width; ?>">
        <div class='row'>
            <?php if (have_rows('videos')) : ?>
                <div class="<?php echo $vidoWidth; ?> captioned-banner__videos">
                    <?php
                    while (have_rows('videos')) : the_row();
                        $video = get_sub_field('video');
                    ?>
                        <video playsinline autoplay muted <?php if (get_sub_field('video_loop') == 'loop') : echo 'loop'; endif; ?>>
                            <source src="<?= $video['url'] ?>" type="video/mp4">
                        </video>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
            <?php if(get_sub_field('caption')): ?>
                <div class='col-lg <?php echo $align; ?>'>
                    <?php the_sub_field('caption'); ?>
                </div>
            <?php endif; ?>
        </div> <!-- row -->
    </div><!-- container -->
</section>