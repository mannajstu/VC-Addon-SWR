<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

function woo_products_shortcode($atts, $content = null)
{
    extract(shortcode_atts(array(
        'count' => '3',
        'category' => '',
        'css' => '',
    ), $atts));


    if (!empty($category)) {
        $woo_products = new WP_Query(array(
            'post_type' => 'product',
            'posts_per_page' => $count,
            'ignore_sticky_posts' => 1,
            'tax_query' => array(
                array(
                    'taxonomy' => 'category',
                    'terms' => $category
                )
            )
        ));
    } else {
        $woo_products = new WP_Query(array('posts_per_page' => $count, 'post_type' => 'product', 'ignore_sticky_posts' => 1));
    }

    if (function_exists('vc_shortcode_custom_css_class')) {
        $custom_css = vc_shortcode_custom_css_class($css);
    } else {
        $custom_css = '';
    }

    $woo_products_post_markup = '<div class="row ' . esc_attr($custom_css) . '">';

    while ($woo_products->have_posts()) : $woo_products->the_post();
        $post_id = get_the_ID();
        $post_content = get_the_content();

        $woo_products_post_markup .= '
            <div class="col-lg-4 col-md-6">
                <div class="xzopro-single-blog-post">
                    <div class="post-thumb-wrapper">
                        <div class="post-thumb" ';
        if (has_post_thumbnail()) {
            $woo_products_post_markup .= '
                style="background-image: url(' . esc_url(get_the_post_thumbnail_url($post_id, 'large')) . ')"';
        }
        $woo_products_post_markup .= '></div>
                        
                        <div class="post-thumb-link">
                            <div class="post-link-tbl">
                                <div class="post-link-tbl-cell">
                                    <a href="' . get_the_permalink($post_id) . '" class="post-link">   
                                        <i class="fa fa-link"></i>        
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                       
                    <div class="post-content">
                        <a href="' . get_the_permalink($post_id) . '"><h4>' . esc_html(get_the_title()) . '</h4></a>
                        
                        <div class="post-header-meta">
                            <ul class="no-list-style">
                                <li class="post-author"><i class="flaticon-finance-avatar"></i>' . get_the_author_posts_link() . '</li>
                                <li><i class="fa fa-calendar"></i>' . get_the_date('d, F , Y') . '</li>
                            </ul>
                        </div>

                        ' . esc_html(wp_trim_words($post_content, 18, '')) . '
                        
                        <div class="post-footer">
                            <p><a class="service-read-more read-more" href="' . get_the_permalink($post_id) . '">' . esc_html('Read More') . '</a></p>
                            <p class="text-right comment-count"><i class="fa fa-comments-o"></i>' . get_comments_number($post_id) . '</p>
                        </div>
                    </div>                        
                </div>
            </div>
        ';
    endwhile;

    $woo_products_post_markup .= '</div>';

    wp_reset_query();

    return $woo_products_post_markup;
}
add_shortcode('woo_products', 'woo_products_shortcode');
