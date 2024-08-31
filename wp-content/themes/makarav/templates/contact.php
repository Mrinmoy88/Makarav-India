<?php 
/*
Template Name: Contact
*/
get_header();
?>



<?php get_template_part('template-parts/banner-section'); ?>

      <!-- ========= banner ========= -->
      <!-- <section class="banner inner_banner inner_banner1">
         <div class="bnr_line1"></div>
         <div class="bnr_line2"></div>
         <div class="container-fluid">
            <div class="row align-items-center bnr_row">
               <div class="col-lg-6 p-0">
                  <div class="bnr_txt">
                     <h2>contact <br> us</h2>
                  </div>
               </div>
               <div class="col-lg-6 p-0">
                  <div class="bnr_img">
                    <img src="assets/img/inner/inner_bnr.png" width="866" height="219" alt="">
                     <p>Mauris sagittis dapibus turpis eu pharetra. Cras eu felis ligula. Aenean feugiat sem eu libero aliquam, at lobortis ipsum rutrum.</p>
                  </div>
               </div>
            </div>
         </div>
      </section> -->

      <section class="inner_contact">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 cl_col p-1">
                <div class="map">
                    <?php $google_map_embed_url = get_field('google_map_embed_url'); ?>
                    <?php if ($google_map_embed_url): ?>
                        <iframe src="<?php echo esc_url($google_map_embed_url); ?>" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-6 cl_col p-1 o-der2">
                <div class="contact_box">
                    <?php $contact_background_image = get_field('contact_background_image'); ?>
                    <?php if ($contact_background_image): ?>
                        <img src="<?php echo esc_url($contact_background_image['url']); ?>" width="818" height="670" alt="" class="contact_bg">
                    <?php endif; ?>
                    <div class="inner_heading">
                        <h2><?php the_field('contact_heading'); ?></h2>
                    </div>
                    <div class="info_div">
                        <h4>Call Us :</h4>
                        <?php if (have_rows('phone_numbers')): ?>
                            <?php while (have_rows('phone_numbers')): the_row(); ?>
                                <a href="tel: <?php the_sub_field('phone_number'); ?>"><?php the_sub_field('phone_number'); ?></a> <br>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                    <div class="info_div">
                        <h4>Email :</h4>
                        <?php if (have_rows('emails')): ?>
                            <?php while (have_rows('emails')): the_row(); ?>
                                <a href="mailto: <?php the_sub_field('email'); ?>"><?php the_sub_field('email'); ?></a> <br>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                    <div class="info_div">
                        <h4><?php the_field('address_title'); ?> :</h4>
                        <?php if (have_rows('address_lines')): ?>
                            <?php while (have_rows('address_lines')): the_row(); ?>
                                <p><?php the_sub_field('address_line'); ?></p>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6 cl_col p-1 o-der1">
                <div class="contact_img">
                    <?php $contact_image = get_field('contact_image'); ?>
                    <?php if ($contact_image): ?>
                        <img src="<?php echo esc_url($contact_image['url']); ?>" width="818" height="670" alt="">
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
                     <h2>Need help with the best services ?</h2>
                     <p>Aliquam ac tristique leo. Duis ultricies sollicitudin aliquam. Nunc dictum feugiat quam, quis ornare dui semper sit amet. Aenean quis molestie turpis, in volutpat felis. </p>
                  </div>
                  <a class="primary-btn">Contact Us</a>
               </div>
            </div>
         </div>
      </section> -->
      <?php get_template_part('template-parts/footer-top'); ?>


<?php 
get_footer();
?>