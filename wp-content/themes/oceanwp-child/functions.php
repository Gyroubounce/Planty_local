<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );
         
if ( !function_exists( 'child_theme_configurator_css' ) ):
    function child_theme_configurator_css() {
        wp_enqueue_style( 'chld_thm_cfg_child', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array( 'font-awesome','simple-line-icons','oceanwp-style','oceanwp-hamburgers','oceanwp-minus' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css', 10 );

// END ENQUEUE PARENT ACTION



//modification du lien admin dans le header//

function modify_nav_menu_items($items, $args) {
    // Vérifiez si le menu ciblé est 'primary' ou autre emplacement correct
    if ($args->menu == 'header') {

        $admin_url = 'http://localhost/planty_local/wp-admin';
        // Créez l'élément à rechercher
        $admin_item = '<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1483"><a href="' . $admin_url . '" class="wpr-menu-item wpr-pointer-item">Admin</a></li>';

        // Si l'utilisateur est connecté
        if (is_user_logged_in()) {
            // Aucun changement n'est nécessaire, le lien Admin reste visible
        } else {
            // Si l'utilisateur n'est pas connecté, assurez-vous que le lien Admin n'est pas présent
            $items = str_replace($admin_item, '', $items);
        }
    }

    return $items;
}

add_filter('wp_nav_menu_items', 'modify_nav_menu_items', 10, 2);

