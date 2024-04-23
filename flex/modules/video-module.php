<?php
$videoURL = get_sub_field( 'video_url' );
$mobileURL = get_sub_field('mobile_url');
$viewStyle = get_sub_field('view_style');
$btnUrl = get_sub_field('button_link');
$classes = get_sub_field('padding') . " " . get_sub_field('margin');
$color = get_sub_field('background_color');

?>

<section class="video-module <?php echo $viewStyle . ' ' . $classes; ?>" <?php if( !empty($color) ){ 
    echo "style='background-color: $color;'";
    } ?> data-module="Video">
    <?php if ( $videoURL ) : ?>
    <div class="video-module__container <?php if($viewStyle == 'container' ): echo 'container'; endif ?>">

        <video class="video-module__vid <?php if ($mobileURL) : echo 'vid-desktop'; endif; ?>" autoplay playsinline <?php if (get_sub_field('video_loop') == 'loop') : echo 'loop'; endif; ?> muted>
            <source src="<?php echo $videoURL; ?>" type="video/mp4">
        </video>

        <?php if ( $mobileURL ) : ?>
            <video class="video-module__vid vid-mobile" autoplay playsinline <?php if (get_sub_field('video_loop') == 'loop') : echo 'loop'; endif; ?> muted>
                <source src="<?php echo $mobileURL; ?>" type="video/mp4">
            </video>
        <?php endif ?>
    </div>
    <?php endif; ?>
</section>