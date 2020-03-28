<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package itCerebrum
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="container main-header">
    <img src="<?php echo get_template_directory_uri() . '/images/logo.svg' ?>" class="main-header__logo" alt="Лого">
    <?php
    wp_nav_menu( array(
        'theme_location' => 'header-menu'
    ) );?>
    <ul class="main-header__user-navigation user-navigation">
        <li class="user-navigation__item">
            <a class="user-navigation__link" href="#">
                <img src="<?php echo get_template_directory_uri() . '/icons/icon-cart.svg' ?>" class="user-navigation__icon">
            </a>
        </li>
        <li class="user-navigation__item">
            <a class="user-navigation__link" href="#">
                <img src="<?php echo get_template_directory_uri() . '/icons/icon-search.svg' ?>" class="user-navigation__icon">
            </a>
        </li>
    </ul>
</header>

