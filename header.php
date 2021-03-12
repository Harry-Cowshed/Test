<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <title><?php wp_title(); ?></title>
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
        <?php wp_head(); ?>
    </head>
<body <?php body_class(); ?>>
<div class="container">
<header>
    <h1 id="main_title">Cider Cider Cider</h1>
    <!-- <?php the_title(); ?> -->
    <!-- gets the title from WP -->
    <?php 
        wp_nav_menu(
            [
                'theme_location' => 'main_nav',
                'menu_class' => 'main_nav',
                'orderby' => 'menu_order',
            ]
        )
    ?>
</header>
