<section class="ftr_top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="heading">
                    <h2><?php the_field('footer_top_heading'); ?></h2>
                    <p><?php the_field('footer_top_text'); ?></p>
                </div>
                <?php
                $button = get_field('footer_top_button');
                if( $button ):
                    $button_url = $button['url'];
                    $button_title = $button['title'];
                ?>
                    <a class="primary-btn" href="<?php echo esc_url($button_url); ?>"><?php echo esc_html($button_title); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
