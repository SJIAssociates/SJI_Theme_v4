
<div class="bg-color__<?php the_sub_field('background_color') ?> cards-module basic-content-left">
    <div class="container">
        <h3 class="cards-header orange--font"><?php the_sub_field( 'header' ); ?></h3>
        <div class="card-container d-flex justify-content-between">
            <?php $columns = get_sub_field('columns');
                if($columns) {
                    foreach($columns as $columns) {
                        echo '<div class="card-column col d-flex flex-column">';
                            echo $columns['card_content'];
                        echo '</div>';
                    }
                }
            ?>
        </div>
    </div>
</div>