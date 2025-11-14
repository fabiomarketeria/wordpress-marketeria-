<?php
/**
 * Marketeria Theme Functions
 * 
 * Funções e configurações personalizadas para o tema Marketeria
 * 
 * @package Marketeria
 * @since 1.0.0
 */

// Prevenir acesso direto ao arquivo
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Configuração do tema Marketeria
 */
function marketeria_setup() {
    // Suporte a título dinâmico
    add_theme_support('title-tag');
    
    // Suporte a imagens destacadas
    add_theme_support('post-thumbnails');
    
    // Suporte a HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    
    // Suporte a logo customizado
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    
    // Suporte a cores customizadas
    add_theme_support('custom-background');
    
    // Suporte a cores customizadas do editor
    add_theme_support('editor-color-palette', array(
        array(
            'name'  => __('Marketeria Primary', 'marketeria'),
            'slug'  => 'marketeria-primary',
            'color' => '#0073aa',
        ),
        array(
            'name'  => __('Marketeria Secondary', 'marketeria'),
            'slug'  => 'marketeria-secondary',
            'color' => '#005177',
        ),
        array(
            'name'  => __('Marketeria Accent', 'marketeria'),
            'slug'  => 'marketeria-accent',
            'color' => '#00a0d2',
        ),
    ));
    
    // Registrar menus de navegação
    register_nav_menus(array(
        'primary' => __('Menu Principal', 'marketeria'),
        'footer'  => __('Menu do Rodapé', 'marketeria'),
    ));
}
add_action('after_setup_theme', 'marketeria_setup');

/**
 * Registrar áreas de widgets
 */
function marketeria_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar Principal', 'marketeria'),
        'id'            => 'sidebar-1',
        'description'   => __('Adicione widgets à sidebar principal', 'marketeria'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    
    register_sidebar(array(
        'name'          => __('Rodapé', 'marketeria'),
        'id'            => 'footer-1',
        'description'   => __('Adicione widgets ao rodapé', 'marketeria'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'marketeria_widgets_init');

/**
 * Enfileirar scripts e estilos
 */
function marketeria_scripts() {
    // Estilo principal do tema
    wp_enqueue_style('marketeria-style', get_stylesheet_uri(), array(), '1.0.0');
    
    // Script principal (se necessário)
    wp_enqueue_script('marketeria-script', get_template_directory_uri() . '/js/main.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'marketeria_scripts');

/**
 * Customização do rodapé
 */
function marketeria_footer_branding() {
    echo '<div class="footer-branding">';
    echo '<p>' . sprintf(
        __('&copy; %1$s Marketeria. Todos os direitos reservados. | Desenvolvido com %2$s', 'marketeria'),
        date('Y'),
        '<span style="color: #dc143c;">&hearts;</span>'
    ) . '</p>';
    echo '</div>';
}

/**
 * Adicionar classe personalizada ao body
 */
function marketeria_body_classes($classes) {
    $classes[] = 'marketeria-theme';
    
    if (is_front_page()) {
        $classes[] = 'marketeria-home';
    }
    
    return $classes;
}
add_filter('body_class', 'marketeria_body_classes');

/**
 * Customizar excerpt length
 */
function marketeria_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'marketeria_excerpt_length');

/**
 * Customizar excerpt more
 */
function marketeria_excerpt_more($more) {
    return '... <a href="' . get_permalink() . '" class="read-more">' . __('Leia mais', 'marketeria') . '</a>';
}
add_filter('excerpt_more', 'marketeria_excerpt_more');

/**
 * Adicionar suporte a Customizer do WordPress
 */
function marketeria_customize_register($wp_customize) {
    // Seção de cores da Marketeria
    $wp_customize->add_section('marketeria_colors', array(
        'title'    => __('Cores Marketeria', 'marketeria'),
        'priority' => 30,
    ));
    
    // Cor primária
    $wp_customize->add_setting('marketeria_primary_color', array(
        'default'           => '#0073aa',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'marketeria_primary_color', array(
        'label'    => __('Cor Primária', 'marketeria'),
        'section'  => 'marketeria_colors',
        'settings' => 'marketeria_primary_color',
    )));
    
    // Cor secundária
    $wp_customize->add_setting('marketeria_secondary_color', array(
        'default'           => '#005177',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'marketeria_secondary_color', array(
        'label'    => __('Cor Secundária', 'marketeria'),
        'section'  => 'marketeria_colors',
        'settings' => 'marketeria_secondary_color',
    )));
    
    // Seção de informações da empresa
    $wp_customize->add_section('marketeria_company_info', array(
        'title'    => __('Informações da Empresa', 'marketeria'),
        'priority' => 40,
    ));
    
    // Nome da empresa
    $wp_customize->add_setting('marketeria_company_name', array(
        'default'           => 'Marketeria',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('marketeria_company_name', array(
        'label'    => __('Nome da Empresa', 'marketeria'),
        'section'  => 'marketeria_company_info',
        'type'     => 'text',
    ));
    
    // Slogan da empresa
    $wp_customize->add_setting('marketeria_company_slogan', array(
        'default'           => 'Sua empresa personalizada no WordPress',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('marketeria_company_slogan', array(
        'label'    => __('Slogan da Empresa', 'marketeria'),
        'section'  => 'marketeria_company_info',
        'type'     => 'text',
    ));
}
add_action('customize_register', 'marketeria_customize_register');

/**
 * Adicionar CSS customizado baseado nas configurações do Customizer
 */
function marketeria_customizer_css() {
    $primary_color = get_theme_mod('marketeria_primary_color', '#0073aa');
    $secondary_color = get_theme_mod('marketeria_secondary_color', '#005177');
    ?>
    <style type="text/css">
        :root {
            --marketeria-primary: <?php echo esc_attr($primary_color); ?>;
            --marketeria-secondary: <?php echo esc_attr($secondary_color); ?>;
        }
    </style>
    <?php
}
add_action('wp_head', 'marketeria_customizer_css');

/**
 * Adicionar meta tags personalizadas
 */
function marketeria_meta_tags() {
    ?>
    <meta name="generator" content="WordPress + Marketeria Theme">
    <meta name="theme-version" content="1.0.0">
    <?php
}
add_action('wp_head', 'marketeria_meta_tags');

/**
 * Menu de fallback quando nenhum menu está configurado
 */
function marketeria_fallback_menu() {
    echo '<ul id="primary-menu" class="menu">';
    echo '<li><a href="' . esc_url(home_url('/')) . '">' . __('Início', 'marketeria') . '</a></li>';
    wp_list_pages(array(
        'title_li' => '',
        'depth'    => 1,
    ));
    echo '</ul>';
}
