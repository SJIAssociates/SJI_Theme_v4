<?php

$args = array(
    'post_type' => 'post',
    'posts_per_page' => 3,
);

$postQuery = new WP_Query( $args );

?>

<div class="related-posts bg-color__<?php the_sub_field('background_color') ?>">
    <div class="container">
        <h2>More Insights</h2>
        <?php if ( $postQuery->have_posts() ) : ?>
        <div class="related-posts__grid">
            <?php while ( $postQuery->have_posts() ) : $postQuery->the_post();  ?>
            <div class="related-posts__post">
                <span class="related-posts__post-author"><?php the_author(); ?></span>
                <h3><?php the_title();?></h3>
                <?php the_category();?>
                <?php the_excerpt(); ?>
                <button class="btn btn--asterisk">Read More</button>
            </div>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
        <?php endif;?>
        <!--a href="/about/" class="btn btn--asterisk">learn more about sji</a-->
    </div>
</div>

<?php wp_reset_query(); ?>