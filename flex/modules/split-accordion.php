<?php $image = get_sub_field( 'image' ); ?>

<div class="split-accordion">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <?php if ( have_rows( 'accordion_items' ) ) : ?>
                <div class="accordion" id="splitAccordion">
                    <?php 
                    $counter = 0;
                    while ( have_rows( 'accordion_items' ) ) : the_row(); ?>
                    <div class="accordion-item" style="color:<?php the_sub_field( 'text_color' ); ?>;">
                        <h2 class="accordion-header" id="heading<?php echo $counter;?>">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse<?php echo $counter;?>" aria-expanded="false"
                                aria-controls="collapse<?php echo $counter;?>"
                                style="color:<?php the_sub_field( 'text_color' ); ?>;">
                                <?php the_sub_field( 'heading' ); ?>
                            </button>
                        </h2>
                        <div id="collapse<?php echo $counter;?>" class="accordion-collapse collapse"
                            aria-labelledby="heading<?php echo $counter;?>" data-bs-parent="#splitAccordion">
                            <div class="accordion-body">
                                <?php the_sub_field( 'content' ); ?>
                            </div>
                        </div>
                    </div>
                    <?php 
                    $counter ++;
                    endwhile;?>
                </div>
                <?php endif;?>
            </div>
            <div class="col-lg-6">
                <?php if ( $image ) : ?>
                <img class="split-accordion__img" src="<?php echo esc_url( $image['url'] ); ?>"
                    alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>