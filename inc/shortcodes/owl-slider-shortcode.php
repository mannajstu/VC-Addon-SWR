<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

function woo_products_slider_shortcode($atts, $content = null)
{
    extract(shortcode_atts(array(
        'image_silder' => '',
        'css' => '',
    ), $atts));
    print_r($css);
    $gallery_img_ids = explode(',', $image_silder);
    $gallery_img_array = array();

    if (function_exists('vc_shortcode_custom_css_class')) {
        $custom_css = vc_shortcode_custom_css_class($css);
    } else {
        $custom_css = '';
    }
    $woo_products_post_markup = '  
    <div class="row ' . esc_attr($custom_css) . '">   
    ';
    $woo_products_post_markup .= ' <div class="owl-carousel swr-owl-carousel-1">';

    foreach ($gallery_img_ids as $gallery_img_id) {
        $gallery_img_array = wp_get_attachment_image_src($gallery_img_id);
        $image_alt = get_post_meta($gallery_img_id, '_wp_attachment_image_alt', true);

        $woo_products_post_markup .= '<div >     <img src="' . esc_url($gallery_img_array[0]) . '" alt="' . esc_attr($image_alt) . '">
        </div>';
    }

    $woo_products_post_markup .= '</div>';

    $woo_products_post_markup .= '</div>
    <script>
			jQuery(window).load(function(){
				jQuery(".swr-owl-carousel-1").owlCarousel({
				    items: 1,
                    loop:true,
                    margin:2,
				    nav:true,
                    smartSpeed:1000,
                    responsive:{
                        0:{
                            items:2
                        },
                        600:{
                            items:3
                        },
                        1000:{
                            items:5
                        }
                    },	    
				    dots: false,
				    autoplayTimeout: 4000,
				    navText: ["<i class=\'fa fa-angle-left\'></i>", "<i class=\'fa fa-angle-right\'></i>"],
				});
			});
		</script>';


    wp_reset_query();


    return $woo_products_post_markup;
}
add_shortcode('woo_products_slider', 'woo_products_slider_shortcode');
