<?php
$color = get_sub_field('background_color');
$paddingTop = get_sub_field('padding_top');
$paddingBottom = get_sub_field('padding_bottom');
?>


<section class="counter-content <?= get_sub_field('class') . " " . $paddingTop . " " .$paddingBottom; ?>"  <?php if( !empty($color) ){ 
    echo "style='background-color: $color;'";
    } ?>  data-module="counter">
    <div class="post-content container">
        <?php $columns = get_sub_field('statistic_repeater');
        if ($columns) : ?>
            <div class="d-flex justify-content-center flex-wrap">
                <?php foreach ($columns as $column) {
                    echo '<div class="counter-num-container">';
                        echo "<span class='num'>{$column['number']}{$column['unit']}</span>";
                        echo "<p>{$column['description']} </p>";
                    echo '</div>';
                }
                ?>
            </div>
        <?php endif; ?>
    </div><!-- container -->
</section>