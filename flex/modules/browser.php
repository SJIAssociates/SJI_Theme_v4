<?php
$file = get_sub_field( 'preview' );
$fileType = (wp_check_filetype($file)['ext']  == 'mp4') ? 'video' : 'image';
$btnUrl = get_sub_field('button_link');

$color = get_sub_field('background_color');
$classes = get_sub_field('padding');
?>

<section class="video-module browser <?php echo $classes; ?>"  <?php if( !empty($color) ){ 
    echo "style='background-color: $color;'";
    } ?>  data-module="browser">
    
    <div class="video-module__container browser container">
        <div class="browser-bar"></div>
        <?php if ( $fileType== 'image' ) : ?>
            <img src="<?php echo $file; ?>" alt="Website Preview Window">
        <?php else: ?>
        <video class="video-module__vid" autoplay playsinline <?php if (get_sub_field('video_loop') == 'loop') : echo 'loop'; endif; ?> muted>
            <source src="<?php echo $file ; ?>" type="video/mp4">
        </video>
        <?php endif; ?>
        <?php if ( $btnUrl ) : ?>
            <span class="btn btn--asterisk"><a target="blank" href="<?php echo esc_url($btnUrl['url']); ?>"><?php echo esc_html($btnUrl['title']); ?></a></span>
        <?php endif; ?>
    </div>
    
</section>