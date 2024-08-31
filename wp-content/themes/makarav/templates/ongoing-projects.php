<?php 
/*
Template Name: Ongoing Projects
*/
get_header();
?>

<?php get_template_part('template-parts/banner-section'); ?>
<!-- <section class="banner inner_banner inner_banner1">
         <div class="bnr_line1"></div>
         <div class="bnr_line2"></div>
         <div class="container-fluid">
            <div class="row align-items-center bnr_row">
               <div class="col-lg-6 p-0">
                  <div class="bnr_txt">
                     <h2>ongoing <br> projects</h2>
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

      <section class="inner_op_sec1">
    <div class="container-fluid">
        <div class="row">
            <?php
            // Query for the latest post
            $args = array(
                'post_type' => 'ongoing-project', // Adjust this if you're using a custom post type
                'posts_per_page' => 1,
                'orderby' => 'date',
                'order' => 'DESC',
            );
            $query = new WP_Query($args);

            // Check if there are any posts
            if ($query->have_posts()) : 
                while ($query->have_posts()) : $query->the_post();
                    // Fetch post thumbnail
                    $thumbnail_id = get_post_thumbnail_id(); 
                    $thumbnail_url = wp_get_attachment_image_url($thumbnail_id, 'full'); // Fetch the full size image
                    $thumbnail_alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);

                    // Get post permalink and title
                    $post_permalink = get_permalink();
                    $post_title = get_the_title();

                    // Fetch custom fields
                    $background_image = get_field('background_image');
                    $heading = get_field('heading');
                    $subheading = get_field('subheading');
                    $content = get_field('content');
            ?>
                <div class="col-md-5 col-12 cl_col p-1">
                    <div class="op_img">
                        <?php if ($thumbnail_url): ?>
                            <a href="<?php echo esc_url($post_permalink); ?>" title="<?php echo esc_attr($post_title); ?>">
                                <img src="<?php echo esc_url($thumbnail_url); ?>" width="634" height="557" alt="<?php echo esc_attr($thumbnail_alt); ?>">
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-7 col-12 cl_col p-1">
                    <div class="op_txt">
                        <?php if ($background_image): ?>
                            <img src="<?php echo esc_url($background_image['url']); ?>" width="1004" height="557" alt="<?php echo esc_attr($background_image['alt']); ?>" class="op_bg">
                        <?php endif; ?>
                        <div class="inner_heading">
                        <a href="<?php echo esc_url($post_permalink); ?>" title="<?php echo esc_attr($post_title); ?>">
                            <h2><?php echo esc_html($post_title); ?></h2> <!-- Dynamic heading from post title -->
                            </a>
                            <p><?php echo esc_html($subheading); ?></p>
                        </div>
                        <?php echo wp_kses_post($content); ?>
                    </div>
                </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else : ?>
                <p><?php esc_html_e('No posts found.', 'text-domain'); ?></p>
            <?php endif; ?>
        </div>
    </div>
</section>





<section class="inner_op_sec2">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="heading">
                    <h2>Other Projects</h2>
                </div>
            </div>
            <div class="col-12 p-0">
                <div class="secSliderWrap">
                    <div class="secSlider" id="secOProjectSlider">
                        <?php
                        // Custom query for ongoing-project post type with project_type taxonomy 'other-projects'
                        $args = array(
                            'post_type' => 'ongoing-project',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'project_type',
                                    'field'    => 'slug',
                                    'terms'    => 'other-projects',
                                ),
                            ),
                            'posts_per_page' => -1, // Fetch all posts
                            'orderby' => 'date', // Order by date
                            'order' => 'DESC' // Descending order
                        );
                        $other_projects = new WP_Query($args);

                        if ($other_projects->have_posts()) :
                            while ($other_projects->have_posts()) : $other_projects->the_post();
                        ?>
                        <div class="item">
                            <div class="secItem">
                                <div class="op_box">
                                    <div class="op_img">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <?php the_post_thumbnail('full', array('width' => 459, 'height' => 367)); ?>
                                            <?php else : ?>
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/default-project.png" width="459" height="367" alt="Default Project Image">
                                            <?php endif; ?>
                                        </a>
                                    </div>
                                    <div class="inner_heading">
                                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    </div>
                                    <p><?php the_excerpt(); ?></p>
                                </div>
                            </div>
                        </div>
                        <?php
                            endwhile;
                            wp_reset_postdata();
                        else :
                        ?>
                        <p><?php _e('No other projects found.', 'textdomain'); ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="secSliderNavWrap">
                        <div class="secSliderNav secOProjectSliderPrev slick-arrow">
                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/img/left_arrow.png" width="81" height="81" alt="" title="">
                        </div>
                        <div class="secSliderNav secOProjectSliderNext slick-arrow">
                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/img/right_arrow.png" width="81" height="81" alt="" title="">
                        </div>
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
<?php 
get_footer();
?>