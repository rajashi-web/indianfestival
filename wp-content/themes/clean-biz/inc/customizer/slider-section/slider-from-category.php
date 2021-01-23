<?php

global $clean_biz_panels;
global $clean_biz_sections;
global $clean_biz_settings_controls;
global $clean_biz_repeated_settings_controls;
global $clean_biz_customizer_defaults;

/*defaults values*/
$clean_biz_customizer_defaults['clean-biz-featured-slider-category'] = 1;

/*page selection*/
$clean_biz_sections['clean-biz-featured-slider-cat'] =
    array(
        'priority'       => 30,
        'title'          => __( 'Select From category', 'clean-biz' ),
        'description'    => __( 'This option only work when you have selected "Post" in "Settings Options".', 'clean-biz' ),
        'panel'          => 'clean-biz-featured-slider',
    );

/*creating setting control for clean-biz-fs-page start*/
$clean_biz_repeated_settings_controls['clean-biz-featured-slider-category'] =
    array(
        'repeated' => 3,
        'clean-biz-fs-cat-ids' => array(
            'setting' =>     array(
                'default'              => $clean_biz_customizer_defaults['clean-biz-featured-slider-category'],
            ),
            'control' => array(
                'label'                 =>  __( 'Select Page For Slide %s', 'clean-biz' ),
                'section'               => 'clean-biz-featured-slider-cat',
                'type'                  => 'category_dropdown',
                'priority'              => 10,
                'description'           => ''
            )
        ),
        'clean-biz-fs-pages-divider' => array(
            'control' => array(
                'section'               => 'clean-biz-fs-selection-setting',
                'type'                  => 'message',
                'priority'              => 10,
                'description'           => '<br /><hr />'
            )
        )
    );

