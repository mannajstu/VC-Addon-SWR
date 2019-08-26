<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}


vc_map(
    array(
        "name" => __("Post Count", "xzopro-toolkit"),
        "base" => "woo_products",
        "category" => __("SWR VC", "xzopro-toolkit"),
        "icon"  => SWR_ACC_URL . '/assets/images/td-logo.png',
        "params" => array(

            array(
                "type" => "textfield",
                "param_name" => "count",

            ),

            array(
                'type' => 'css_editor',
                'heading' => __('Css Box', 'xzopro-toolkit'),
                'param_name' => 'css',

            )




        )
    )
);
