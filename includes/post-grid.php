<div class="post-grid">
    <div class="container">
        <div class="post-grid__grid">
            <?php while ( have_posts() ) :  the_post(); ?>
            <div class="post-grid__post">
                <a href="<?php the_permalink();?>" aria-label="<?php the_title();?>">
                    <?php if(has_post_thumbnail()) : 
                    the_post_thumbnail(); ?>
                    <?php else : ?>
                    <div class="post-grid__post__placeholder">
                        <p>SJI</p>
                    </div>
                    <?php endif; ?>
                </a>
                <div class="post-grid__post__overlay">
                    <div class="post-grid__post__info">
                        <h3><?php the_field( 'client' ); ?> <span><?php the_title();?></span></h3>
                        <?php 
                         $categories = get_the_category();
                         if ( ! empty( $categories ) ) {
                             echo esc_html( $categories[0]->name );
                         } ?>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>