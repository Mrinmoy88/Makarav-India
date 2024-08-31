<!DOCTYPE html>
<html lang="en">

<head>

   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
   <title>MACARAV</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap-grid.min.css" integrity="sha512-Aa+z1qgIG+Hv4H2W3EMl3btnnwTQRA47ZiSecYSkWavHUkBF2aPOIIvlvjLCsjapW1IfsGrEO3FU693ReouVTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css" integrity="sha512-nNlU0WK2QfKsuEmdcTwkeh+lhGs6uyOxuUs+n+0oXSYDok5qy0EI0lt01ZynHq6+p/tbgpZ7P+yUb+r71wqdXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <!-- <link rel="stylesheet" href="<?php //echo get_template_directory_uri(); ?>/assets/css/bootstrap-grid.css"> -->
   <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/slick-theme.min.css">
   <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/slick.min.css">
   <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/custom-style.css">

   <?php wp_head(); ?>   
</head>

<body>
   <!-- header start -->
   <div class="header-area">
      <header>
         <nav class="container-fluid" id='menu'>
		 <div class="logo">
    <a href="<?php echo esc_url(home_url('/')); ?>">
        <?php 
            $logo = get_field('site_logo', 'option');
            if( $logo ): ?>
                <img loading="lazy" width="272" height="82" src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
        <?php endif; ?>
    </a>
</div>

            <div class="hamburger"></div>
            <div class="main-menu">
			
    <?php
    wp_nav_menu(array(
        'theme_location' => 'header-menu',
        'container' => false,
        'menu_class' => 'current-menu-item',
        'items_wrap' => '<ul>%3$s</ul>',
        'depth' => 2, // Adjust depth to allow sub-menus
    ));
    ?>
<?php 
$c_link = get_field('contact_link','option');
if( $c_link ): 
    $c_link_url = $c_link['url'];
    $c_link_title = $c_link['title'];
    ?>
<a class="primary-btn" href="<?php echo esc_url( $c_link_url ); ?>"><?php echo esc_html( $c_link_title ); ?></a> 
<?php endif; ?>

            </div>
         </nav>
      </header>
   </div>
   <main>