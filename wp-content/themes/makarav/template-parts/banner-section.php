<?php
// Check if ACF is active and the necessary fields are available
if (function_exists('get_field')) :
    $banner_heading = get_field('banner_heading');
    $banner_image = get_field('banner_image');
    $banner_description = get_field('banner_description');
?>
<section class="banner inner_banner">
   <div class="bnr_line1"></div>
   <div class="bnr_line2"></div>
   <div class="container-fluid">
      <div class="row align-items-center bnr_row">
         <div class="col-lg-6 p-0">
            <div class="bnr_txt">
               <?php if ($banner_heading): ?>
                  <h2><?php echo $banner_heading; ?></h2>
               <?php endif; ?>
            </div>
         </div>
         <div class="col-lg-6 p-0">
            <div class="bnr_img">
               <?php if ($banner_image): ?>
                  <img src="<?php echo esc_url($banner_image['url']); ?>" width="866" height="219" alt="<?php echo esc_attr($banner_image['alt']); ?>">
               <?php endif; ?>
               <?php if ($banner_description): ?>
                  <p><?php echo $banner_description; ?></p>
               <?php endif; ?>
            </div>
         </div>
      </div>
   </div>
</section>
<?php endif; ?>
