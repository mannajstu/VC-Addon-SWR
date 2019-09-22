<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}


vc_map(
    array(
        "name" => __("Product Slider"),
        "base" => "woo_products_slider",
        "category" => __("SWR VC"),
        "icon"  => SWR_ACC_URL . '/assets/images/td-logo.png',
        "params" => array(

            array(
                "type" => "attach_images",
                "param_name" => "image_silder",
                'heading' => __('Put Images'),
                'group' => __('Image')
            ),

            array(
                'type' => 'css_editor',
                'heading' => __('Css Box'),
                'param_name' => 'css',

            )




        )
    )
);
