<?php 
/*
Template Name: About
*/
get_header();
?>


<?php get_template_part('template-parts/banner-section'); ?>
      <!-- ========= banner ========= -->
      <!-- <section class="banner inner_banner about_banner">
   <div class="bnr_line1"></div>
   <div class="bnr_line2"></div>
   <div class="container-fluid">
      <div class="row align-items-center bnr_row">
         <div class="col-lg-6 p-0">
            <div class="bnr_txt">
               <h2><?php //the_field('banner_heading'); ?></h2>
            </div>
         </div>
         <div class="col-lg-6 p-0">
            <div class="bnr_img">
               <?php //$banner_image = get_field('banner_image'); ?>
               <?php //if( $banner_image ): ?>
                  <img src="<?php //echo esc_url($banner_image['url']); ?>" width="866" height="219" alt="<?php //echo esc_attr($banner_image['alt']); ?>">
               <?php //endif; ?>
               <p><?php //the_field('banner_description'); ?></p>
            </div>
         </div>
      </div>
   </div>
</section> -->


<section class="inner_about">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-12 ab_col p-1">
                <div class="ab_box ab_box1">
                    <div class="inner_heading">
                        <h2><?php the_field('about_us_heading'); ?></h2>
                    </div>
                    <p><?php the_field('about_us_text'); ?></p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12 ab_col p-1">
                <div class="ab_img">
                    <?php $image1 = get_field('image_1'); ?>
                    <?php if( $image1 ): ?>
                        <img src="<?php echo esc_url($image1['url']); ?>" width="537" height="558" alt="<?php echo esc_attr($image1['alt']); ?>">
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12 ab_col p-1">
                <div class="ab_box">
                    <p><?php the_field('additional_text_1'); ?></p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12 ab_col p-1">
                <div class="ab_img">
                    <?php $image2 = get_field('image_2'); ?>
                    <?php if( $image2 ): ?>
                        <img src="<?php echo esc_url($image2['url']); ?>" width="537" height="488" alt="<?php echo esc_attr($image2['alt']); ?>">
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-8 col-sm-12 col-12 ab_col p-1">
                <div class="ab_box ab_box2">
                    <div class="inner_heading">
                        <h2><?php the_field('strategic_aim_heading'); ?></h2>
                    </div>
                    <p><?php the_field('strategic_aim_text'); ?></p>
                </div>
            </div>
            <div class="col-md-7 col-12 ab_col p-1 o-der2">
                <div class="ab_box ab_box3">
                    <div class="inner_heading">
                        <h2><?php the_field('future_goals_heading'); ?></h2>
                    </div>
                    <p><?php the_field('future_goals_text'); ?></p>
                    <p><?php the_field('future_goals_additional_text'); ?></p>
                    <?php if( have_rows('future_goals_list') ): ?>
                        <ul>
                            <?php while( have_rows('future_goals_list') ): the_row(); ?>
                                <li><?php the_sub_field('goal_item'); ?></li>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-5 col-12 ab_col p-1 o-der1">
                <div class="ab_img">
                    <?php $image3 = get_field('image_3'); ?>
                    <?php if( $image3 ): ?>
                        <img src="<?php echo esc_url($image3['url']); ?>" width="683" height="873" alt="<?php echo esc_attr($image3['alt']); ?>">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>


       <!-- ========= secfooter top design ========= -->
       <!-- <section class="ftr_top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="heading">
                    <h2><?php //the_field('footer_top_heading'); ?></h2>
                    <p><?php //the_field('footer_top_text'); ?></p>
                </div>
                <?php
                //$button = get_field('footer_top_button');
                //if( $button ):
                    //$button_url = $button['url'];
                    //$button_title = $button['title'];
                ?>
                    <a class="primary-btn" href="<?php //echo esc_url($button_url); ?>"><?php //echo esc_html($button_title); ?></a>
                <?php //endif; ?>
            </div>
        </div>
    </div>
</section> -->
<?php get_template_part('template-parts/footer-top'); ?>


<?php 
get_footer();
?>