<?php 

$collage = get_field('images');

?>

<div class="image-collage bg-color__<?php the_sub_field('background_color') ?>">
    <div class="container">
        <?php if ( have_rows('images') ) :  ?>
            <div class="image-collage__grid">
                <?php while ( have_rows('images') ): the_row() ?>
                    <figure class="image-collage__item <?php echo get_sub_field('orientation'); ?>">
                        <?php
                        $file = get_sub_field( 'file'); 
                        $file_name = $file['filename']; 
                        $filetype = wp_check_filetype($file_name)['ext']; 
                        ?>
                        <?php if (($filetype == "mp4") || ($filetype == "webm")) { ?>
                            <video playsinline autoplay muted loop>
                                <source src="<?php echo $file['url']; ?>" type="video/mp4">
                            </video>
                        <?php }else{ ?>     
                            <img src="<?php echo $file['url']; ?>" alt="<?php echo $file['alt']; ?>" />
                        <?php } ?> 
                    </figure>
                <?php endwhile; ?>
            </div>
        <?php endif;?>
    </div>
</div>