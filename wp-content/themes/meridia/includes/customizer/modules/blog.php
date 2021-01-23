<?php

/**
 * Customizer Blog
 *
 * @package Meridia
 * @since 1.0.0
 */
if ( !defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}
/**
* 05 Blog
*/
/**
* Pagination
*/
Kirki::add_field( 'meridia_config', array(
    'type'     => 'radio',
    'settings' => 'meridia_pagination_settings',
    'label'    => esc_attr__( 'Pagination options', 'meridia' ),
    'section'  => 'meridia_post_pagination',
    'default'  => 'buttons',
    'choices'  => array(
    'button'  => esc_attr__( 'Load More Button', 'meridia' ),
    'numbers' => esc_attr__( 'Numbers', 'meridia' ),
),
) );
/**
* Meta
*/
// Meta category
Kirki::add_field( 'meridia_config', array(
    'type'     => 'toggle',
    'settings' => 'meridia_meta_category_settings',
    'label'    => esc_attr__( 'Show meta category', 'meridia' ),
    'section'  => 'meridia_post_meta',
    'default'  => 1,
) );
// Meta date control
Kirki::add_field( 'meridia_config', array(
    'type'     => 'toggle',
    'settings' => 'meridia_meta_date_settings',
    'label'    => esc_attr__( 'Show meta date', 'meridia' ),
    'section'  => 'meridia_post_meta',
    'default'  => 1,
) );
// Meta comments control
Kirki::add_field( 'meridia_config', array(
    'type'     => 'toggle',
    'settings' => 'meridia_meta_comments_settings',
    'label'    => esc_attr__( 'Show meta comments', 'meridia' ),
    'section'  => 'meridia_post_meta',
    'default'  => 1,
) );
/**
* Single Post
*/
// Post tags
Kirki::add_field( 'meridia_config', array(
    'type'     => 'toggle',
    'settings' => 'meridia_post_tags_settings',
    'label'    => esc_attr__( 'Show tags', 'meridia' ),
    'section'  => 'meridia_single_post',
    'default'  => 1,
) );
// Related posts
Kirki::add_field( 'meridia_config', array(
    'type'     => 'toggle',
    'settings' => 'meridia_related_posts_settings',
    'label'    => esc_attr__( 'Show related posts', 'meridia' ),
    'section'  => 'meridia_single_post',
    'default'  => 1,
) );
// Related by
Kirki::add_field( 'meridia_config', array(
    'type'     => 'select',
    'settings' => 'meridia_related_posts_relation',
    'label'    => esc_html__( 'Related by', 'meridia' ),
    'section'  => 'meridia_single_post',
    'default'  => 'category',
    'choices'  => array(
    'category' => esc_attr__( 'Category', 'meridia' ),
    'tag'      => esc_attr__( 'Tag', 'meridia' ),
    'author'   => esc_attr__( 'Author', 'meridia' ),
),
) );
/**
* Posts Excerpt
*/
Kirki::add_field( 'meridia_config', array(
    'type'     => 'number',
    'settings' => 'meridia_posts_excerpt_settings',
    'label'    => esc_attr__( 'Posts excerpt options', 'meridia' ),
    'section'  => 'meridia_post_excerpt',
    'default'  => 55,
    'choices'  => array(
    'min'  => 0,
    'max'  => 9999,
    'step' => 1,
),
) );