<?php
$offset = get_sub_field('offset');
$color = get_sub_field('background_color');
$width = get_sub_field('width');
$paddingTop = get_sub_field('padding_top');
$paddingBottom = get_sub_field('padding_bottom');
?>


<section class="basic-content-left <?= get_sub_field('class') . " " . $paddingTop . " " .$paddingBottom; ?>"  <?php if( !empty($color) ){ 
    echo "style='background-color: $color;'";
    } ?>  data-module="basic-left">
    <div class="post-content container">
        <div class='row'>
            <div class='<?php echo $width . " " . $offset; ?>'>
                <?php the_sub_field('content'); ?>
            </div>
        </div>

        <?php $columns = get_sub_field('columns');
        if ($columns) : ?>
            <div class="d-flex justify-content-between basic-content-left__columns">
                <?php foreach ($columns as $columns) {
                    echo '<div>';
                    echo "<p><strong> {$columns['header']} </strong></p>";
                    echo "<p>{$columns['list']} </p>";
                    echo '</div>';
                }
                ?>
            </div>
        <?php endif; ?>
    </div><!-- container -->
</section>