<?php 
/*
Template Name: Clients
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
                     <h2>our <br> clients</h2>
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
<?php
      // Pagination setup
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$clients_per_page = 28; // Number of clients per page
$clients = get_field('clients');
$total_clients = count($clients);
$total_pages = ceil($total_clients / $clients_per_page);
$offset = ($paged - 1) * $clients_per_page;
$current_clients = array_slice($clients, $offset, $clients_per_page);
?>

<section class="inner_client">
    <div class="container-fluid">
        <div class="row">
            <?php if ($current_clients): ?>
                <?php foreach ($current_clients as $client): ?>
                    <div class="col-lg-3 col-sm-4 col-6 cl_col p-1">
                        <div class="client_box">
                            <img src="<?php echo esc_url($client['client_image']['url']); ?>" alt="<?php echo esc_attr($client['client_image']['alt']); ?>">
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="row pagination">
            <?php if ($paged > 1): ?>
                <a href="<?php echo get_pagenum_link(1); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/inner/pegi_left1.png" alt=""></a>
                <a href="<?php echo get_pagenum_link($paged - 1); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/inner/pegi_left2.png" alt=""></a>
            <?php endif; ?>
            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <a class="<?php if ($i == $paged) echo 'active'; ?>" href="<?php echo get_pagenum_link($i); ?>"><?php echo $i; ?></a>
            <?php endfor; ?>
            <?php if ($paged < $total_pages): ?>
                <a href="<?php echo get_pagenum_link($paged + 1); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/inner/pegi_right2.png" alt=""></a>
                <a href="<?php echo get_pagenum_link($total_pages); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/inner/pegi_right1.png" alt=""></a>
            <?php endif; ?>
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