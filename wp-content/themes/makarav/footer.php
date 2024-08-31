 <!-- ========= footer ========= -->
 <footer>
         <div class="container-fluid">
            <div class="row ftr_top_row">
               <div class="col-lg-3 col-sm-6 p-0">
               <div class="ftr_item">
    <?php 
    // Get footer logo from ACF
    $footer_logo = get_field('footer_logo', 'option'); 
    $footer_text = get_field('footer_text', 'option'); 

    if ($footer_logo): 
        // Get the logo URL
        $logo_url = $footer_logo['url'];
        $logo_width = $footer_logo['width'];
        $logo_height = $footer_logo['height'];
        ?>
        <img src="<?php echo esc_url($logo_url); ?>" width="<?php echo esc_attr($logo_width); ?>" height="<?php echo esc_attr($logo_height); ?>" alt="Footer Logo">
    <?php endif; ?>
    
    <?php if ($footer_text): ?>
        <p><?php echo esc_html($footer_text); ?></p>
    <?php endif; ?>
</div>

               </div>
               <div class="col-lg-3 col-sm-6 p-0">
                  <div class="ftr_item ftr_item1">
                  <ul>
    <?php
    wp_nav_menu(
        array(
            'theme_location' => 'footer-menu', // This should match the location registered in functions.php
            'container'      => false,         // Remove container <div> or <nav> tags
            'items_wrap'     => '%3$s',        // Remove <ul> tags wrapping menu items
            'depth'          => 1,             // Display only top-level menu items
            'fallback_cb'    => false          // No fallback function
        )
    );
    ?>
</ul>

                  </div>
               </div>
               <div class="col-lg-3 col-sm-6 p-0">
                  <div class="ftr_item ftr_item1">
                  <ul>
    <?php
    wp_nav_menu(
        array(
            'theme_location' => 'custom-menu', // This should match the location registered in functions.php
            'container'      => false,         // Remove container <div> or <nav> tags
            'items_wrap'     => '%3$s',        // Remove <ul> tags wrapping menu items
            'depth'          => 1,             // Display only top-level menu items
            'fallback_cb'    => false          // No fallback function
        )
    );
    ?>
</ul>

                  </div>
               </div>
               <div class="col-lg-3 col-sm-6 p-0">
               <div class="ftr_item ftr_item1">
    <ul>
        <li><a href="#">Contacts</a></li>
        <li>
            <div>
                <?php 
                // Get phone numbers from ACF repeater field
                if (have_rows('phone_numbers', 'option')): 
                    while (have_rows('phone_numbers', 'option')): the_row(); 
                        $phone_number = get_sub_field('phone_number'); 
                        if ($phone_number): ?>
                            <a href="tel:<?php echo esc_attr($phone_number); ?>"><?php echo esc_html($phone_number); ?></a> <br>
                        <?php endif;
                    endwhile; 
                endif; 
                ?>
            </div>
        </li>
        <li>
            <div>
                <?php 
                // Get email addresses from ACF repeater field
                if (have_rows('email_addresses', 'option')): 
                    while (have_rows('email_addresses', 'option')): the_row(); 
                        $email_address = get_sub_field('email_address'); 
                        if ($email_address): ?>
                            <a href="mailto:<?php echo esc_attr($email_address); ?>"><?php echo esc_html($email_address); ?></a> <br>
                        <?php endif;
                    endwhile; 
                endif; 
                ?>
            </div>
        </li>
    </ul>
</div>

               </div>
            </div>
            <div class="row ftr_btm_row">
               <div class="col-lg-5">
               <div class="ftr_left">
        <p>© <?php echo date('Y'); ?> | All rights reserved by <a href="<?php the_field('footer_company_url', 'option'); ?>" target="_blank"><?php the_field('footer_company_name', 'option'); ?></a></p>
    </div>
               </div>
               <div class="col-lg-7">
                  <div class="ftr_right">
                  <?php 
                     $p_link = get_field('p_link','option');
                     if( $p_link ): 
                        $p_link_url = $p_link['url'];
                        $p_link_title = $p_link['title'];
                        ?>
                     <a href="<?php echo  $p_link_url ; ?>"><?php echo  $p_link_title ; ?></a>
                     <?php endif; ?>
                     <?php 
                     $t_link = get_field('t_link','option');
                     if( $t_link ): 
                        $t_link_url = $t_link['url'];
                        $t_link_title = $t_link['title'];
                        ?>
                     <a href="<?php echo  $t_link_url ; ?>"><?php echo  $t_link_title ; ?></a>
                     <?php endif; ?>
                     <?php 
                     $r_link = get_field('r_link','option');
                     if( $r_link ): 
                        $r_link_url = $r_link['url'];
                        $r_link_title = $r_link['title'];
                        ?>
                     <a href="<?php echo  $r_link_url ; ?>"><?php echo  $r_link_title ; ?></a>
                     <?php endif; ?>
                  </div>
               </div>
            </div>
         </div>
      </footer>

      <!-- =============== Footer =============== -->
      
   </main>
   
   
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js" integrity="sha512-EKWWs1ZcA2ZY9lbLISPz8aGR2+L7JVYqBAYTq5AXgBkSjRSuQEGqWx8R1zAX16KdXPaCjOCaKE8MCpU0wcHlHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js" integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script src="<?php echo get_template_directory_uri(); ?>/assets/js/script.js"></script>

   <?php wp_footer(); ?>
    
</body>

</html>