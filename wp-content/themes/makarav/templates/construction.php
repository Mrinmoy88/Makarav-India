<?php 
/*
Template Name: construction
*/
get_header();
?>

 <!-- ========= banner ========= -->
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

      <section class="inner_project">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="heading">
                <?php
    // Get the title of the current page
    $page_title = get_the_title();
    echo '<h2>' . esc_html($page_title) . '</h2>';
?>
                </div>
            </div>
            <?php
            // Define the query to fetch projects
            $args = array(
                'post_type' => 'project',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'project_categories', // Replace with your custom taxonomy name
                        'field'    => 'slug',
                        'terms'    => 'construction', // Replace with your category slug
                    ),
                ),
                'posts_per_page' => -1 // Fetch all posts
            );
            $real_estate_projects_query = new WP_Query($args);

            // The Loop
            if ($real_estate_projects_query->have_posts()) :
                while ($real_estate_projects_query->have_posts()) : $real_estate_projects_query->the_post();
            ?>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12 pj_col p-1">
                    <div class="project_box">
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('full', ['width' => '537', 'height' => '557', 'alt' => get_the_title()]); ?>
                            </a>
                        <?php endif; ?>
                        <div class="project_box_txt">
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <p><?php the_content(); ?></p>
                        </div>
                    </div>
                </div>
            <?php
                endwhile;
            else :
                echo '<p>No projects found.</p>';
            endif;

            // Reset Post Data
            wp_reset_postdata();
            ?>
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