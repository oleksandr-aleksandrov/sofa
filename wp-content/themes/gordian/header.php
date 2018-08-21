<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gordian
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">


    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header class="main-header pt-2 pt-sm-4">
    <nav>
        <div class="container">
            <div class="row align-items-center  ">
                <div class="col-md-2">
                    <?php $logo = wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'header_logo_sm'); ?>
                    <a class="d-block" href="<?php bloginfo('url'); ?>">
                        <img class="img-fluid" src="<?php echo $logo[0]; ?>" alt="<?php bloginfo('name'); ?>"/>
                    </a>
                </div>
                <div class="col-md-8 mr-auto text-center">
                    <a class="d-inline-block text-uppercase logo-title" href="<?php bloginfo('url'); ?>">
                        <p class="text-center d-block m-0">
                            G<span>ordian</span> K<span>not</span>
                        </p>
                    </a>
                </div>
            </div>
            <div class="navbar navbar-expand-md navbar-light  pt-sm-2 main-menu">
                <button class="navbar-toggler mx-auto mt-4" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'menu-1',
                        'menu_id' => 'primary-menu',
                        'menu_class' => 'header-main-menu navbar-nav m-auto header-main-menu d-flex flex-column flex-md-row justify-content-end navbar-nav',
                        'container' => false,
                        'depth' => 2,
                        'walker' => new dropdown_walker_nav_menu()
                    ));
                    ?>
                </div>
            </div>
        </div>
    </nav>
</header>

<main class="main-content">