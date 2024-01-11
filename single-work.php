<?php
//Case Study post template 
get_header(); ?>

<main class="global-main">
    <div class="hero hero--single">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h3><?php the_field('client');?></h3>
                    <h3><?php the_title();?></h3>
                </div>
                <div class="col-lg-6 d-lg-flex flex-row-reverse align-items-end">
                    <div class="hero__categories">
                        <?php
                        $gridTerm_list = wp_get_post_terms( $post->ID, 'case_study_category', array( 'fields' => 'names' ) );
                        echo implode(' &nbsp | &nbsp ', $gridTerm_list);
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php $hero_banner_asset = get_field( 'hero_banner_asset' ); 
            $asset_url = esc_url( $hero_banner_asset['url'] );
            $asset_name = esc_url( $hero_banner_asset['filename'] );
            $filetype = wp_check_filetype($asset_name)['ext'];
        ?>
        <?php if ( $hero_banner_asset ) : ?>
            <?php if (($filetype == "mp4") || ($filetype == "webm")) { ?>
                <div class="hero__banner" style="position: relative;">
                <video playsinline autoplay muted loop style="object-fit: cover; width: 100%; height: 100%; position: absolute; top: 0; left: 0;">
                    <source src="<?php echo $asset_url;?>" type="video/mp4">
                </video>
            <?php }else{ ?>     
                <div class="hero__banner" style="background-image:url('<?php echo $asset_url;?>');">
            <?php } ?> 
        <?php endif; ?>
            <?php if ( have_rows( 'animated_hero_text' ) ) : while ( have_rows( 'animated_hero_text' ) ) : the_row(); ?>
            <div class="container js-gsap-hero">
                <p class="js-gsap-line1"><?php the_sub_field( 'line_1' ); ?></p>
                <p class="js-gsap-line2"><?php the_sub_field( 'line_2' ); ?></p>
                <p class="js-gsap-line3"><?php the_sub_field( 'line_3' ); ?></p>
            </div>
            <?php endwhile; endif; ?>
        </div>
    </div>

    <?php if(get_the_content()) :?>
    <div class="post-content">
        <div class="container">
            <?php the_content();?>
        </div>
    </div>
    <?php endif;?>

    <?php if ( have_rows( 'modular_content' ) ): ?>
    <?php include get_theme_file_path( 'flex/modular-content.php' ); ?>
    <? endif; ?>

</main>

<?php get_footer(); ?>