<?php

/*  
*
* ... your existing code ...
*
*
*/


/**
 * Fix Yoast Elementor Landing Pages Meta
 *
 * This script modifies the permalink structure for the 'e-landing-page' custom post type to use '/%postname%/' when the basic permalink is configured as '/%category%/%postname%/'.
 * It ensures that standard pages and the home page function correctly without resulting in 404 errors and enables Yoast SEO to properly apply meta tags to landing pages.
 *
 * Author: Alan Curtis
 * Website: www.myaiplugins.com
 * License: GPL
 */


// 1. Modify the permalink for 'e-landing-page' to /%postname%/
function custom_e_landing_page_permalink( $post_link, $post ) {
    if ( 'e-landing-page' === $post->post_type && 'publish' === $post->post_status ) {
        return home_url( '/' . $post->post_name . '/' );
    }
    return $post_link;
}
add_filter( 'post_type_link', 'custom_e_landing_page_permalink', 10, 2 );

// 2. Handle URL requests for 'e-landing-page' and standard pages
function custom_e_landing_page_pre_get_posts( $query ) {
    if ( $query->is_main_query() && ! is_admin() && ! is_feed() && ! is_search() ) {

        // Exclude the Home Page from the logic
        if ( is_front_page() || is_home() ) {
            return;
        }

        // Get the requested path
        $requested_path = trim( parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH ), '/' );

        // If the path is empty, it is the Home Page, so skip
        if ( empty( $requested_path ) ) {
            return;
        }

        // Check if it is a top-level URL (without slash)
        if ( strpos( $requested_path, '/' ) === false ) {
            $slug = $requested_path;

            // Verify if a page with this slug exists
            $page = get_page_by_path( $slug, OBJECT, 'page' );

            if ( ! $page ) {
                // Verify if an 'e-landing-page' with this slug exists
                $landing_page = get_posts( array(
                    'name'           => $slug,
                    'post_type'      => 'e-landing-page',
                    'post_status'    => 'publish',
                    'numberposts'    => 1,
                ) );

                if ( $landing_page ) {
                    // Modify the query to load the 'e-landing-page'
                    $query->set( 'post_type', 'e-landing-page' );
                    $query->set( 'name', $slug );
                    $query->is_singular = true;
                    $query->is_page = false;
                    $query->is_single = true;
                    $query->is_404 = false;
                }
            }
        }
    }
}
add_action( 'pre_get_posts', 'custom_e_landing_page_pre_get_posts' );

// 3. Flush rewrite rules on theme activation
function custom_e_landing_page_flush_rewrites() {
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'custom_e_landing_page_flush_rewrites' );





