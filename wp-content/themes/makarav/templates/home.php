<?php
/*
Template Name: Home
*/
get_header();
?>


<!-- ========= banner ========= -->
<section class="banner">
    <div class="bnr_line1"></div>
    <div class="bnr_line2"></div>
    <div class="container-fluid">
        <div class="row align-items-center bnr_row">
            <div class="col-lg-6">
                <div class="bnr_txt">
                    <h3><?php the_field('banner_title'); ?></h3>
                    <h2><?php the_field('banner_subtext'); ?></h2>
                    <div class="bnr_h1">
                        <h1><?php the_field('banner_main_text'); ?></h1>
                        <?php
                        $banner_image = get_field('banner_image');
                        $video_image  = get_field('video_icon');
                        ?>
                        <img src="<?php echo esc_url($banner_image['url']); ?>" width="215" height="215" alt="" class="bnr_txt_img">
                        <a href="<?php the_field('video_link'); ?>" data-fancybox class="bnr_video_icon">
                            <img src="<?php echo esc_url($video_image['url']); ?>" width="44" height="44" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="bnr_slide">
                    <p><?php the_field('banner_para') ?></p>

                    <div class="secSliderWrap">
                        <div class="secSlider" id="secBannerSlider">
                            <?php if (have_rows('slider_images')) : ?>
                                <?php while (have_rows('slider_images')) : the_row(); ?>
                                    <?php $slider_image = get_sub_field('slider_image'); ?>
                                    <div class="item">
                                        <div class="secItem">
                                            <div class="bnr_slider_img">
                                                <img src="<?php echo esc_url($slider_image['url']); ?>" width="281" height="446" alt="">
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="bnr_download">
                        <a href="<?php the_field('download_brochure_url'); ?>" target="_blank">
                            <?php $brochure_image = get_field('download_brochure_image'); ?>
                            <img src="<?php echo esc_url($brochure_image['url']); ?>" width="48" height="42" alt="">
                            <h6>Download<br>Brochure</h6>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- ========= secbrand design ========= -->
<section class="sec_brand">
    <div class="secSliderWrap">
        <div class="secSlider" id="secBrandSlider">
            <?php if (have_rows('brand_slider_images')) : ?>
                <?php while (have_rows('brand_slider_images')) : the_row(); ?>
                    <?php $s_image = get_sub_field('s_image'); ?>
                    <div class="item">
                        <div class="secItem">
                            <div class="brand_slider_img">
                                <img src="<?php echo $s_image['url']; ?>" alt="">
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>


<!-- ========= secabout design ========= -->
<section class="sec_about">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about_col about_col1">
                    <div class="heading">
                        <h2><?php the_field('about_section_heading'); ?></h2>
                    </div>
                    <a href="<?php the_field('about_section_button_link'); ?>" class="primary-btn"><?php the_field('about_section_button_text'); ?></a>
                    <span>About</span>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about_col">
                    <div class="heading">
                        <h2><?php the_field('who_we_are_heading'); ?></h2>
                    </div>
                    <p><?php the_field('who_we_are_description'); ?></p>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- ========= secwork design ========= -->
<section class="sec_work">
    <div class="container-fluid">
        <div class="row sec_work_row">
            <div class="col-12">
                <div class="heading">
                    <h2><?php the_field('work_area'); ?></h2>
                    <p><?php the_field('work_area_description');  ?></p>
                </div>
            </div>
            <?php
            // Query for custom post type 'project'
            $args = array(
                'post_type' => 'project',
                'posts_per_page' => 6
            );
            $projects_query = new WP_Query($args);
            if ($projects_query->have_posts()) :
                while ($projects_query->have_posts()) : $projects_query->the_post();
                    // Get custom fields
                    $project_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
                    $project_title = get_the_title();
                    $project_content = get_the_content();
                    $image_order = get_field('image_order');
                    $content_order = get_field('content_order');
                    $on_project_link = get_permalink();
            ?>
                    <div class="col-lg-6 p-0">
                        <div class="row align-items-end work_row m-0">
                            <?php if ($image_order == '1') : ?>
                                <div class="col-sm-6 p-0 order1">
                                    <div class="work_img">
                                        <a href="<?php echo esc_url($on_project_link); ?>">
                                            <img src="<?php echo esc_url($project_image); ?>" width="422" height="278" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-6 order2">
                                    <div class="work_txt">
                                        <a href="<?php echo esc_url($on_project_link); ?>">
                                            <h3><?php echo $project_title; ?></h3>
                                        </a>
                                        <p><?php echo wp_trim_words($project_content, 20, '...'); ?></p>
                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="col-sm-6 order2">
                                    <div class="work_txt work_txt1">
                                        <a href="<?php echo esc_url($on_project_link); ?>">
                                            <h3><?php echo $project_title; ?></h3>
                                        </a>
                                        <p><?php echo wp_trim_words($project_content, 20, '...'); ?></p>
                                    </div>
                                </div>
                                <div class="col-sm-6 p-0 order1">
                                    <div class="work_img">
                                        <a href="<?php echo esc_url($on_project_link); ?>">
                                            <img src="<?php echo esc_url($project_image); ?>" width="422" height="278" alt="">
                                        </a>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p>No projects found.</p>';
            endif;
            ?>
        </div>
    </div>
</section>



<!-- ========= secproject design ========= -->
<section class="sec_projects">
    <div class="container-fluid">
        <div class="row align-items-end">
            <div class="col-lg-4">
                <div class="project_head">
                    <div class="heading">
                        <h2>Our <br>
                            Ongoing Projects</h2>
                    </div>
                    <a href="<?php echo site_url('/ongoing-projects/'); ?>" class="primary-btn">All Projects</a>
                    <span>Proj <br> ect</span>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="secSliderWrap">
                    <div class="secSlider" id="secProjectSlider">
                        <?php
                        // Custom query for ongoing-project post type
                        $args = array(
                            'post_type' => 'ongoing-project',
                            'posts_per_page' => -1
                        );
                        $ongoing_projects = new WP_Query($args);

                        if ($ongoing_projects->have_posts()) :
                            while ($ongoing_projects->have_posts()) : $ongoing_projects->the_post();
                        ?>
                                <div class="item">
                                    <div class="secItem">
                                        <div class="project_slider">
                                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                            <div class="project_img">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php if (has_post_thumbnail()) : ?>
                                                        <?php the_post_thumbnail('full', array('width' => 459, 'height' => 466)); ?>
                                                    <?php else : ?>
                                                        <img src="assets/img/default-project.png" width="459" height="466" alt="Default Project Image">
                                                    <?php endif; ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            endwhile;
                            wp_reset_postdata();
                        else :
                            ?>
                            <p><?php _e('No ongoing projects found.', 'textdomain'); ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="secSliderNavWrap">
                        <div class="secSliderNav secProjectSliderPrev slick-arrow">
                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/img/left_arrow.png" width="81" height="81" alt="" title="">
                        </div>
                        <div class="secSliderNav secProjectSliderNext slick-arrow">
                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/img/right_arrow.png" width="81" height="81" alt="" title="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>





<!-- ========= secfeedback design ========= -->
<section class="sec_feedback">
    <div class="container-fluid">
        <div class="row feedback_con">
            <div class="heading">
                <h2>Our Clients Feedback</h2>
                <p>Macarav Infrastructures India Pvt. Ltd. has been an established construction company, creating homes and offices in different locations across India. The expertise and experience it offers is based on the industry's standards, all for a reasonably packaged price.</p>
            </div>
            <div class="row m-0">
                <div class="col-lg-2 p-0">
                    <div class="feedback_txt">
                        <span>Feed</span>
                    </div>
                </div>
                <div class="col-lg-10 p-0">
                    <div class="secSliderWrap">
                        <div class="secSlider slider-outer" id="secTestiSlider">
                            <?php if (have_rows('feedbacks')) : ?>
                                <?php while (have_rows('feedbacks')) : the_row(); ?>
                                    <div class="item">
                                        <div class="secItem">
                                            <div class="testi_slider">
                                                <div class="testi_head">
                                                    <?php $client_image = get_sub_field('client_image'); ?>
                                                    <?php if ($client_image) : ?>
                                                        <img src="<?php echo esc_url($client_image['url']); ?>" width="65" height="65" alt="<?php echo esc_attr($client_image['alt']); ?>">
                                                    <?php endif; ?>
                                                    <h2><?php the_sub_field('client_name'); ?></h2>
                                                </div>
                                                <p><?php the_sub_field('feedback_text'); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                        <div class="secSliderNavWrap">
                            <div class="secSliderNav secTestiSliderPrev slick-arrow">
                                <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/img/left_arrow.png" width="81" height="81" alt="" title="">
                            </div>
                            <div class="secSliderNav secTestiSliderNext slick-arrow">
                                <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/img/right_arrow.png" width="81" height="81" alt="" title="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- ========= secBlog design ========= -->
<section class="sec_blog">
    <div class="container-fluid">
        <div class="row blog_con">
            <div class="heading">
                <h2>Blogs</h2>
                <p>Explore our blog for insights into the latest trends, innovations, and expert tips in the construction industry. Stay informed and inspired with updates from Macarav India Pvt Ltd</p>
            </div>
            <div class="secSliderWrap">
                <div class="secSlider" id="secBlogSlider">
                    <?php
                    // Query for custom post type 'post'
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => -1
                    );
                    $blog_query = new WP_Query($args);
                    if ($blog_query->have_posts()) :
                        while ($blog_query->have_posts()) : $blog_query->the_post();
                            $post_title = get_the_title();
                            $post_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
                            $post_link = get_permalink();
                            $post_date = get_the_date('F j, Y');
                    ?>
                            <div class="item">
                                <div class="secItem">
                                    <div class="blog_slider_img">
                                        <div class="blog_txt">
                                            <h3>
                                                <a href="<?php echo esc_url($post_link); ?>">
                                                    <?php echo esc_html($post_title); ?>
                                                </a>
                                            </h3>
                                            <a href="<?php echo esc_url($post_link); ?>">
                                                <div class="blog_icon">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/blog_icon.png" width="25" height="25" alt="">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="blog_date">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/blog_icon2.png" width="25" height="25" alt="">
                                            <p><?php echo esc_html($post_date); ?></p>
                                        </div>
                                        <div class="blog_img">
                                            <a href="<?php echo esc_url($post_link); ?>">
                                                <img src="<?php echo esc_url($post_image); ?>" width="459" height="367" alt="<?php echo esc_attr($post_title); ?>">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    else :
                        echo '<p>No posts found.</p>';
                    endif;
                    ?>
                </div>
                <div class="secSliderNavWrap">
                    <div class="secSliderNav secBlogSliderPrev slick-arrow">
                        <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/img/left_arrow.png" width="81" height="81" alt="" title="">
                    </div>
                    <div class="secSliderNav secBlogSliderNext slick-arrow">
                        <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/img/right_arrow.png" width="81" height="81" alt="" title="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- ========= secfooter top design ========= -->
<section class="ftr_top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="heading">
                    <h2><?php the_field('heading'); ?></h2>
                    <p><?php the_field('description'); ?></p>
                </div>
                <?php
                $link = get_field('link');
                if ($link) :
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                ?>
                    <a class="primary-btn" href="<?php echo esc_url($link_url); ?>"><?php echo esc_html($link_title); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>


<?php
get_footer();
?>