<?php $careerArgs = array(
    'post_type' => 'career',
    'posts_per_page' => 3,
);
$careerQuery = new WP_Query( $careerArgs ); ?>
<div class="careers-grid bg-color__<?php the_sub_field('background_color') ?>">
    <div class="container">
        <h3>Open positions</h3>

        <?php if ( $careerQuery->have_posts() ) : ?>
        <div class="careers-grid__grid">
            <?php while ( $careerQuery->have_posts() ) :  $careerQuery->the_post(); ?>
            <a href="<?php the_permalink();?>" class="careers-grid__item">
                <h3><?php the_title();?></h3>
                <p class='careers-grid__item__hours'><?php the_field( 'fullpart-time' ); ?></p>
                <?php the_excerpt();?>
                <div class="btn btn--asterisk">Learn More</div>
            </a>
            <?php endwhile;?>
        </div>
        <?php endif;?>
    </div>
</div>

<?php wp_reset_query(); ?>