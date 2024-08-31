<?php get_header(); ?>

<?php get_template_part('template-parts/banner-section'); ?>
<!-- <section class="banner inner_banner inner_banner1">
         <div class="bnr_line1"></div>
         <div class="bnr_line2"></div>
         <div class="container-fluid">
            <div class="row align-items-center bnr_row">
               <div class="col-lg-6 p-0">
                  <div class="bnr_txt">
                     <h2>our <br> projects</h2>
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

      <section class="inner_project project_details">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="heading">
                    <h2><?php the_title(); ?></h2>
                    </div>
                </div>
                
                <?php
// Ensure this is a single post of type 'project'
if (have_posts()) : while (have_posts()) : the_post();
    // Get ACF fields
    $pd_img = get_field('pd_img'); // Field name for project image
    $pd_bg_img = get_field('pd_bg_img'); // Field name for background image
    ?>
    <div class="col-lg-9 col-md-8 col-sm-7 col-12 pj_col p-0">
        <div class="pd_con">
            <div class="pd_img">
                <?php if ($pd_img) : ?>
                    <img src="<?php echo esc_url($pd_img['url']); ?>" width="<?php echo esc_attr($pd_img['width']); ?>" height="<?php echo esc_attr($pd_img['height']); ?>" alt="<?php echo esc_attr($pd_img['alt']); ?>">
                <?php else : ?>
                    <img src="assets/img/inner/pd-img.png" width="1229" height="582" alt="">
                <?php endif; ?>
            </div>
            <div class="pd_txt">
                <?php if ($pd_bg_img) : ?>
                    <img src="<?php echo esc_url($pd_bg_img['url']); ?>" width="<?php echo esc_attr($pd_bg_img['width']); ?>" height="<?php echo esc_attr($pd_bg_img['height']); ?>" alt="<?php echo esc_attr($pd_bg_img['alt']); ?>" class="pd_bg_img">
                <?php else : ?>
                    <img src="assets/img/inner/pd_bg_img.png" width="537" height="1102" alt="" class="pd_bg_img">
                <?php endif; ?>
                <div class="inner_heading">
                    <h2><?php the_title(); ?></h2>
                    <p>Interior Work</p>
                </div>
                <p><?php the_content(); ?></p>
                <!-- Add additional custom fields or excerpts as needed -->
                <?php if (have_rows('project_details')) : // Assuming you are using ACF for project details ?>
                    <ul>
                        <?php while (have_rows('project_details')) : the_row(); ?>
                            <li><?php the_sub_field('detail'); ?></li>
                        <?php endwhile; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endwhile; else : ?>
    <p><?php _e('No project found.'); ?></p>
<?php endif; ?>



<div class="col-lg-3 col-md-4 col-sm-5 col-12 pj_col p-2">
    <div class="category">
        <h2>Categories</h2>
        <div class="faq">
            <?php
            // Fetch the categories for the default 'post' post type
            $categories = get_terms(array(
                'taxonomy' => 'category',
                'hide_empty' => false,
            ));

            // Check if there are any categories
            if (!empty($categories) && !is_wp_error($categories)) :
                foreach ($categories as $category) :
                    // Check if there are any posts in the current category
                    $posts_count = get_term_by('id', $category->term_id, 'category')->count;
                    
                    if ($posts_count > 0) : // Only display category if it has posts
                        // Fetch the posts within each category
                        $posts = new WP_Query(array(
                            'post_type' => 'post', // Changed to default post type
                            'posts_per_page' => -1,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'category',
                                    'field' => 'term_id',
                                    'terms' => $category->term_id,
                                ),
                            ),
                        ));
                        ?>
                        <div class="faq-item">
                            <details>
                                <summary>
                                    <h3><?php echo esc_html($category->name); ?></h3>
                                </summary>
                                <div class="faq-ans">
                                    <ul>
                                        <?php if ($posts->have_posts()) :
                                            while ($posts->have_posts()) : $posts->the_post(); ?>
                                                <li>
                                                    <a href="<?php the_permalink(); ?>">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                                                            <path d="M5.625 11.25L9.375 7.5L5.625 3.75" stroke="#1C1C1C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                        </svg>
                                                        <p><?php the_title(); ?></p>
                                                    </a>
                                                </li>
                                            <?php endwhile;
                                            wp_reset_postdata();
                                        else : ?>
                                            <li><?php esc_html_e('No posts found.', 'text-domain'); ?></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </details>
                        </div>
                    <?php endif;
                endforeach;
            else : ?>
                <p><?php esc_html_e('No categories found.', 'text-domain'); ?></p>
            <?php endif; ?>
        </div>
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


      <?php get_footer(); ?>