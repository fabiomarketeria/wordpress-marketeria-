<?php
/**
 * Template do cabeçalho
 * 
 * @package Marketeria
 * @since 1.0.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <header id="masthead" class="site-header">
        <div class="header-content">
            <div class="site-branding">
                <?php
                if (has_custom_logo()) :
                    the_custom_logo();
                else :
                    ?>
                    <h1 class="site-title">
                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                            <?php 
                            $company_name = get_theme_mod('marketeria_company_name', get_bloginfo('name'));
                            echo esc_html($company_name); 
                            ?>
                        </a>
                    </h1>
                    <?php
                    $description = get_theme_mod('marketeria_company_slogan', get_bloginfo('description'));
                    if ($description || is_customize_preview()) :
                        ?>
                        <p class="site-description"><?php echo esc_html($description); ?></p>
                        <?php
                    endif;
                endif;
                ?>
            </div>
        </div>
        
        <nav id="site-navigation" class="main-navigation">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_id'        => 'primary-menu',
                'fallback_cb'    => 'marketeria_fallback_menu',
            ));
            ?>
        </nav>
    </header>

    <div id="content" class="site-content-wrapper">
