<?php
namespace makeway\bloggrid;

$args = array(
    'post_type' => 'post',
    'posts_per_page' => -1,
);
$the_query = new \WP_Query($args);
$args = array ('exclude'=>1);
$gridTerms = get_terms('category',$args);

// pre/post pends content to
// the passed in array of strings
function array_pend( $arr =[], $pre = '', $post = '' )
{
    foreach( $arr as $idx => $str ) {
        $arr[ $idx ] = $pre . $str . $post;
    }
    return $arr;
}
?>

<div class="blog-grid bg-color__<?php the_sub_field('background_color') ?>">
    <div class="container">
        <?php if ($the_query->have_posts()) : ?>
            <ul class="blog-grid__filters">
                <li class="mobile-menu-toggle"><button class="js-post-filter js-active" data-category="0">All</button><i class="fas fa-plus" aria-hidden="true"></i></li>
                <?php $included_categories = get_sub_field( 'included_categories' ); ?>
                <?php if ( $included_categories ) : ?>
                    <?php foreach ( $included_categories as $term ) :
                        echo '<li class="mobile-menu-closed sub-menu-items"><button class="js-post-filter" data-category="' . $term->slug . '">' . $term->name . '</button></li>';
                    endforeach; ?>
                <?php endif; ?>
            </ul>
            <div class="blog-grid__grid js-item-container">
                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                    <article class="blog-grid__item js_filter_item <?
                    echo implode( ' ', array_pend( wp_get_post_terms( $post->ID, 'category', array( 'fields' => 'slugs' ) ), 'js_filter_item-', '' ))
                    ?>">
                        <a href="<?php the_permalink(); ?>" aria-label="<?php the_title(); ?>">
                            <figure>
                                <?php the_post_thumbnail(); ?>
                            </figure>
                        </a>
                        <div class="blog-grid__item-content">

                            <a href="<?php the_permalink(); ?>" aria-label="<?php the_title(); ?>">
                                <span class="blog-grid__item-author"><?php the_author(); ?></span>
                                <h3><?php the_title(); ?></h3>
                                <?php the_category(); ?>
                                <?php the_excerpt(); ?>
                                <a href="<?php the_permalink(); ?>" aria-label="<?php the_title(); ?>"><button class="btn btn--asterisk">Read More</button></a>
                            </a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
        <?php endif;
        wp_reset_postdata(); ?>
    </div>
</div>
<?php wp_reset_query(); ?>