<?php
namespace makeway\casestudycategorygrid;

$category = get_sub_field('select_category');
$term_id = $category->term_id;
$gridTerms = get_terms(array(
    'taxonomy' => 'key_art_type',
    'hide_empty' => false,
));

$args = array(
    'post_type' => 'work',
    'posts_per_page' => -1,
    'tax_query' => array(
        array(
            'taxonomy' => 'case_study_category',
            'field'    => 'term_id',
            'terms'    => $term_id,
        ),
    ),
);

$catQuery = new \WP_Query($args);
$smallCards = get_sub_field('key_art');
$smallCardsProcessed = array();
$bigCardsProcessed = array();

// pre/post pends content to
// the passed in array of strings
function array_pend($arr = [], $pre = '', $post = '')
{
    foreach ($arr as $idx => $str) {
        $arr[$idx] = $pre . $str . $post;
    }
    return $arr;
}

function renderBigCard($card)
{
?>
    <a class="category-grid__post category-grid__post--big js_filter_item <?= $card['category'] ?>" href="<?= $card['permalink'] ?>" aria-label="<?= $card['title'] ?>">
      <?php $case_study_grid_asset = $card['keyart'];
            $asset_url = esc_url( $case_study_grid_asset['url'] );
            $asset_name = esc_url( $case_study_grid_asset['filename'] );
            $filetype = wp_check_filetype($asset_name)['ext'];
            ?>
            <?php if ( $case_study_grid_asset ) : ?>
                <?php if (($filetype == "mp4") || ($filetype == "webm")) { ?>
                    <div class="hero__banner">
                    <video playsinline autoplay muted loop>
                        <source src="<?php echo $asset_url;?>" type="video/mp4">
                    </video>
                <?php }else{ ?>
                    <div class="hero__banner" style="background-image:url('<?php echo $asset_url;?>');">
                <?php } ?>
                    </div>
            <?php endif; ?>
    </a>
<?php
}

function renderSmallCard($card)
{
?>
    <button data-src="<?php if ($card['images']) :  foreach ($card['images'] as $modal_gallery_image) : echo esc_url($modal_gallery_image['sizes']['large']) . ',';
                            endforeach;
                        endif; ?>" 
                        class="category-grid__post category-grid__post--small js-bs-modal js_filter_item <? $card['category'] ?>"
                        data-bs-toggle="modal" 
                        data-bs-target="#artModal"
                        data-title="<?= $card['title'] ?>"
                        data-client="<?= $card['client'] ?>"
                        data-categories="<?= $card['category_for_display'] ?>"
                        data-src="">
        <?php if ($card['images']) :  ?>
            <img src="<?php echo esc_url($card['images'][0]['sizes']['large']); ?>" alt="<?php echo esc_attr($card['images'][0]['alt']); ?>" />
        <?php endif; ?>
    </button>
<?php
}
?>

<div class="modal fade js-bs-artModal" id="artModal" tabindex="-1" aria-labelledby="artModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal__slider-wrap">
                    <div class="modal__slider js-slick-modal"></div>
                </div>
                <div class="modal__content">
                    <h2 class="modal__project"></h2>
                    <p class="modal__client"></p>
                    <p class="modal__categories"></p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="category-grid bg-color__<?php the_sub_field('background_color') ?>">
    <div class="container">
        <ul class="category-grid__filters">
            <li class="mobile-menu-toggle"><button class="js-post-filter js-active" data-category="0">All</button><i class="fas fa-plus" aria-hidden="true"></i></li>
            <?php

            if (!empty($gridTerms) && !is_wp_error($gridTerms)) {
                foreach ($gridTerms as $gridTerm) {
                    echo '<li class="mobile-menu-closed sub-menu-items"><button class="js-post-filter" data-category="' . $gridTerm->slug . '">' . $gridTerm->name . '</button></li>';
                }
            } ?>
        </ul>
        <?php if ($catQuery->have_posts()) : ?>
            <div class="category-grid__grid js-item-container">
                <?php if (have_rows('key_art')) : ?>
                <?php while (have_rows('key_art')) : the_row();
                        $callback = fn ($obj) => $obj->slug;
                        $callbackForName = fn ($obj) => $obj->name;
                        $categories = array_map($callback, get_sub_field('category'));
                        $category = implode(' ', array_pend($categories, 'js_filter_item-', ''));
                        $category_for_display = implode(' | ', array_map($callbackForName, get_sub_field('category_for_display')));
                        $images_images = get_sub_field('images');
                        $title = get_sub_field('title');
                        $client = get_sub_field('client');
                        array_push($smallCardsProcessed, [
                            'category'             => $category,
                            'images'               => $images_images,
                            'title'                => $title,
                            'client'               => $client,
                            'category_for_display' => $category_for_display
                        ]);
                    endwhile;
                endif;
                while ($catQuery->have_posts()) : $catQuery->the_post();
                    $permalink = get_permalink();
                    $title = get_the_title();
                    // $thumbnail = get_the_post_thumbnail();
                    $keyart = get_field( 'key_art_asset' );;
                    $category = implode(' ', array_pend(wp_get_post_terms($post->ID, 'key_art_type', array('fields' => 'slugs')), 'js_filter_item-', ''));
                    array_push($bigCardsProcessed, [
                        'permalink' => $permalink,
                        'title'     => $title,
                        // 'thumbnail' => $thumbnail,
                        'category' => $category,
                        'keyart' => $keyart,
                    ]);
                endwhile;
                wp_reset_postdata();
                $numBigCards = count($bigCardsProcessed);
                $numSmallCards = count($smallCardsProcessed);
                $totalCards = $numBigCards + $numSmallCards;
                $nextBigCard = 5;
                $nextBigCardLeft = true;
                //Alternate printing small and big cards
                for ($i = 0; $i < $totalCards; $i++) {
                    if ($i === $nextBigCard) {
                        if (sizeof($bigCardsProcessed) > 0) {
                            renderBigCard(array_shift($bigCardsProcessed));
                            $nextBigCard += $nextBigCardLeft ? 10 : 4;
                            $nextBigCardLeft = !$nextBigCardLeft;
                        } else {
                            renderSmallCard(array_shift($smallCardsProcessed));
                        }
                    } else {
                        if (sizeof($smallCardsProcessed) > 0) {
                            renderSmallCard(array_shift($smallCardsProcessed));
                        } else {
                            renderBigCard(array_shift($bigCardsProcessed));
                        }
                    }
                }
                ?>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php wp_reset_query(); ?>