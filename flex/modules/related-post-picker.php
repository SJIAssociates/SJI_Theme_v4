<?php $posts = get_sub_field( 'posts' ); ?>


<div class="related-posts bg-color__<?php the_sub_field('background_color');?>">
    <div class="container">
        <h2><?php the_sub_field( 'heading' ); ?></h2>
        <?php if ( $posts ) : ?>
        <div class="related-posts__grid">
            <?php foreach ( $posts as $post ) : setup_postdata( $post ); ?>
            <a href="<?php the_permalink();?>" class="related-posts__figure">
                <?php
                // $similar_projects_img = get_field( 'similar_projects_image' );
                // $asset_url = esc_url( $similar_projects_img['url'] );

                $mobile_asset = get_field( 'mobile_asset' );
                if( !empty($mobile_asset) ): $mobile_url = esc_url( $mobile_asset['url']); else: $mobile_url = ''; endif;

                
                if ( $mobile_url ) : ?>
                    <div class="hero__banner" style="background-image:url('<?php echo $mobile_url;?>');"></div>
                <?php endif; ?>
            </a>
            <?php endforeach; wp_reset_postdata(); ?>
        </div>
        <?php endif;?>
        <a href="/about/" class="btn btn--asterisk <?php echo the_sub_field("learn_more_button");?>">learn more about sji</a>
    </div>
</div>