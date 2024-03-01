<?php
//Grab the Selected Case Studies.
$featuredPosts = get_sub_field('featured_work');

?>
<section class="post-grid bg-color__<?php the_sub_field('background_color') ?> <?php if ( get_sub_field( 'small_margins' ) == 1 ) : ?>post-grid--small-margins<?php endif; ?>">
    <div class="container">
        <?php
        // all of the posts
        if ( $featuredPosts ) : ?>
            <div class="post-grid__grid js-item-container" >
                <?php foreach( $featuredPosts as $post ):
                    setup_postdata($post);
                    // get the list of filterable terms for this post
                    $gridTerm_list = wp_get_post_terms( $post->ID, 'case_study_category', array( 'fields' => 'names' ) );
                    ?>

                    <div class="post-grid__post <? echo get_field('case_study_grid_orientation'); ?>" >
                    <a href="<?php the_permalink();?>" aria-label="<?php the_title();?>">
                        <?php
                        $case_study_grid_asset = get_field( 'case_study_grid_asset' );

                        $asset_url = esc_url( $case_study_grid_asset['url'] );
                        $asset_name = esc_url( $case_study_grid_asset['filename'] );
                        
                        $filetype = wp_check_filetype($asset_name)['ext'];

                        $mobile_asset = get_field( 'mobile_asset' );
                        if( !empty($mobile_asset) ): $mobile_url = esc_url( $mobile_asset['url']); else: $mobile_url = ''; endif;

                        ?>
                        <?php if ( $case_study_grid_asset ) : ?>
                            <?php if (($filetype == "mp4") || ($filetype == "webm")) { ?>
                                <div class="hero__banner grid-image-desktop">
                                    <video class="lazy" playsinline autoplay muted loop poster="<?php echo get_field('poster'); ?>">
                                        <source data-src="<?php echo $asset_url;?>" type="video/mp4">
                                    </video>
                            <?php }else{ ?>
                                <div class="hero__banner grid-image-desktop" style="background-image:url('<?php echo $asset_url; ?>')">
                            <?php } ?>
                                </div>
                                <div class="hero__banner grid-image-mobile" style="background-image:url('<?php echo $mobile_url; ?>')"></div>
                        <?php endif; ?>


                        <div class="post-grid__post__overlay">
                            <div class="post-grid__post__info">
                                <h3><?php the_field( 'client' ); ?> <span><?php the_title();?></span></h3>
                                <p> <?php echo implode(' | ', $gridTerm_list); ?> </p>
                            </div>
                        </div>
                        </a>
                    </div>
                <?php endforeach; ?>


            </div>
            <?php endif;
        wp_reset_postdata(); ?>
    </div>

    <div class="container">
        <?php if( get_sub_field('see_more_work_button') == TRUE ): ?>
            <a id="cs_see_more_work" href="/work">
                <span class="btn btn--asterisk">View More Work</span>
            </a>
        <?php endif; ?>
    </div>   
</section>