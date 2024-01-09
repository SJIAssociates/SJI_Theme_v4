<div class="testimonials" id="<?php echo get_sub_field('unique_id'); ?>">
    <div class="container">
        <div class="slider-container">
            <div class="js-slick-testimonial">
                <?php $slides = get_sub_field('testimonial');
                    if($slides) {
                        foreach($slides as $slides) {
                            echo '<div class="testimonial">';
                                echo '<h3>'; 
                                    echo $slides['testimonial_copy'];
                                echo '</h3><p><span>';
                                    echo $slides['author_name'];
                                echo '</span>';
                                    echo $slides['author_title'];
                                echo '</p>';
                            echo '</div>';
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</div>

