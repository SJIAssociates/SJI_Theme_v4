<div class="category-grid">
    <div class="container">
        <?php if ( have_posts() ) : ?>
        <div class="category-grid__grid">
            <?php while ( have_posts() ) :the_post(); ?>
            <a class="category-grid__post" href="<?php the_permalink();?>">
                <?php if(has_post_thumbnail()) : 
                    the_post_thumbnail(); ?>
                <?php else : ?>
                <div class="category-grid__post__placeholder">
                    <p>SJI</p>
                </div>
                <?php endif; ?>
            </a>
            <?php endwhile;?>
        </div>
        <?php 
            wp_reset_postdata();
            endif;
        ?>
    </div>
</div>