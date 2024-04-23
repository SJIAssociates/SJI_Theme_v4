<?php 

$video_columns = get_field('video_columns');
$cols = get_sub_field('columns');

?>

<div class="video-grid" style="background-color:<?php echo get_sub_field('background_color'); ?>">
    <div class="container">
        <?php if ( have_rows('video_columns') ) :  ?>
        <div class="video-grid__grid <?php echo $cols; ?>">
            <?php while ( have_rows('video_columns') ): the_row() ?>
            <figure class="video-grid__item">
                <video class="video-grid__vid" playsinline autoplay loop muted>
                    <source src="<?php echo get_sub_field( 'video_url' ); ?>" type="video/mp4">
                </video>
            </figure>
            <?php endwhile;?>
        </div>
        <?php endif;?>
    </div>
</div>