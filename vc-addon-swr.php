<?php
/*
Plugin Name: VC Addon SWR
Plugin URI: 
Author: 
Author URI: 
Version: 1.0
Description: This plugin is required for Xzopro wordpress theme
textdomain: 
*/
function shapeSpace_recent_posts_shortcode($atts)
{

    global $post;

    extract(shortcode_atts(array(
        'cat'     => '',
        'num'     => '5',
        'order'   => 'DESC',
        'orderby' => 'post_date',
        'numberofpostperrow' => '1',
    ), $atts));

    $args = array(
        'cat'            => $cat,
        'posts_per_page' => $num,
        'order'          => $order,
        'orderby'        => $orderby,
    );

    $output = '';

    $posts = get_posts($args);

    foreach ($posts as $post) {

        setup_postdata($post);

        $output .= '<div class="col-md-' . $numberofpostperrow . '">' . get_the_content() . '</div>';
    }

    wp_reset_postdata();

    return '<div class="row">' . $output . '</div>';
}
add_shortcode('recent_posts', 'shapeSpace_recent_posts_shortcode');

add_action('vc_before_init', 'your_name_integrateWithVC');
function your_name_integrateWithVC()
{
    vc_map(array(
        "name" => __("Recent Post", "my-text-domain"),
        "base" => "recent_posts",

        "category" => __("New Cat", "my-text-domain"),

        "params" => array(
            array(
                "type" => "textfield",

                "heading" => __("Number Of Post", "my-text-domain"),
                "param_name" => "num",
                "value" => __("1", "my-text-domain"),
                "description" => __("Description for foo param.", "my-text-domain")
            ),
            array(
                "type" => "textfield",

                "heading" => __("Number Of Post in Row", "my-text-domain"),
                "param_name" => "numberofpostperrow",
                "value" => __("1", "my-text-domain"),
                "description" => __("Description for foo param.", "my-text-domain")
            )
        )
    ));
}
