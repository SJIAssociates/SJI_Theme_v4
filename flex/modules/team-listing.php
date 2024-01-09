<?php $teamArgs = array(
    'post_type' => 'team_member',
    'posts_per_page' => 20,
    'order' => 'ASC'
);
$teamQuery = new WP_Query( $teamArgs );

?>

<div id="team-module" class="team-listing bg-color__<?php the_sub_field('background_color') ?>">
    <div class="container">
        <h3>Our team</h3>
        <?php if ( $teamQuery->have_posts() ) : ?>
        <div class="team-listing__grid">
            <?php while ( $teamQuery->have_posts() ) :  $teamQuery->the_post(); 
            $alt_portrait = get_field( 'alt_portrait' );
            $gif = get_field( 'hover_gif'); ?>
        
            <div class="team-listing__item">
                <figure>
                    <?php the_post_thumbnail();?>
                    <?php if ( $alt_portrait ) : ?>
                    <img class="img--alt team-member-img" src="<?php echo esc_url( $alt_portrait['url'] ); ?>"
                        alt="<?php echo esc_attr( $alt_portrait['alt'] ); ?>" />
                    <?php endif; ?>
                    <img class="gif-hover" src="<?php the_field( 'hover_gif' ); ?>">
                </figure>
                <p><strong><?php the_title();?></strong></p>
                <p><?php the_field( 'title' ); ?></p>
            </div>
            <?php endwhile;
           wp_reset_postdata(); ?>
        </div>
        <?php endif;?>
    </div>
</div>