<?php
/**
 * Plugin Name: Marketeria Core
 * Plugin URI: https://marketeria.com/plugins/marketeria-core
 * Description: Plugin principal para funcionalidades customizadas da Marketeria. Este plugin adiciona recursos específicos para sua empresa, incluindo configurações personalizadas, tipos de post customizados e integrações.
 * Version: 1.0.0
 * Author: Marketeria Team
 * Author URI: https://marketeria.com
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: marketeria-core
 * Domain Path: /languages
 */

// Prevenir acesso direto ao arquivo
if (!defined('ABSPATH')) {
    exit;
}

// Definir constantes do plugin
define('MARKETERIA_CORE_VERSION', '1.0.0');
define('MARKETERIA_CORE_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('MARKETERIA_CORE_PLUGIN_URL', plugin_dir_url(__FILE__));

/**
 * Classe principal do plugin Marketeria Core
 */
class Marketeria_Core {
    
    /**
     * Instância única da classe
     */
    private static $instance = null;
    
    /**
     * Obter instância única
     */
    public static function get_instance() {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    /**
     * Construtor
     */
    private function __construct() {
        $this->init_hooks();
    }
    
    /**
     * Inicializar hooks do WordPress
     */
    private function init_hooks() {
        add_action('init', array($this, 'register_custom_post_types'));
        add_action('init', array($this, 'register_custom_taxonomies'));
        add_action('admin_menu', array($this, 'add_admin_menu'));
        add_action('admin_init', array($this, 'register_settings'));
        add_filter('the_content', array($this, 'add_custom_branding'));
        
        // Ativar tradução
        add_action('plugins_loaded', array($this, 'load_textdomain'));
    }
    
    /**
     * Carregar tradução
     */
    public function load_textdomain() {
        load_plugin_textdomain('marketeria-core', false, dirname(plugin_basename(__FILE__)) . '/languages');
    }
    
    /**
     * Registrar tipos de post customizados
     */
    public function register_custom_post_types() {
        // Tipo de post: Projetos
        register_post_type('marketeria_project', array(
            'labels' => array(
                'name'               => __('Projetos', 'marketeria-core'),
                'singular_name'      => __('Projeto', 'marketeria-core'),
                'add_new'            => __('Adicionar Novo', 'marketeria-core'),
                'add_new_item'       => __('Adicionar Novo Projeto', 'marketeria-core'),
                'edit_item'          => __('Editar Projeto', 'marketeria-core'),
                'new_item'           => __('Novo Projeto', 'marketeria-core'),
                'view_item'          => __('Ver Projeto', 'marketeria-core'),
                'search_items'       => __('Buscar Projetos', 'marketeria-core'),
                'not_found'          => __('Nenhum projeto encontrado', 'marketeria-core'),
                'not_found_in_trash' => __('Nenhum projeto na lixeira', 'marketeria-core'),
            ),
            'public'       => true,
            'has_archive'  => true,
            'show_in_rest' => true,
            'supports'     => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
            'menu_icon'    => 'dashicons-portfolio',
            'rewrite'      => array('slug' => 'projetos'),
        ));
        
        // Tipo de post: Depoimentos
        register_post_type('marketeria_testimonial', array(
            'labels' => array(
                'name'               => __('Depoimentos', 'marketeria-core'),
                'singular_name'      => __('Depoimento', 'marketeria-core'),
                'add_new'            => __('Adicionar Novo', 'marketeria-core'),
                'add_new_item'       => __('Adicionar Novo Depoimento', 'marketeria-core'),
                'edit_item'          => __('Editar Depoimento', 'marketeria-core'),
                'new_item'           => __('Novo Depoimento', 'marketeria-core'),
                'view_item'          => __('Ver Depoimento', 'marketeria-core'),
                'search_items'       => __('Buscar Depoimentos', 'marketeria-core'),
                'not_found'          => __('Nenhum depoimento encontrado', 'marketeria-core'),
                'not_found_in_trash' => __('Nenhum depoimento na lixeira', 'marketeria-core'),
            ),
            'public'       => true,
            'has_archive'  => true,
            'show_in_rest' => true,
            'supports'     => array('title', 'editor', 'thumbnail'),
            'menu_icon'    => 'dashicons-testimonial',
            'rewrite'      => array('slug' => 'depoimentos'),
        ));
    }
    
    /**
     * Registrar taxonomias customizadas
     */
    public function register_custom_taxonomies() {
        // Taxonomia: Tipo de Projeto
        register_taxonomy('project_type', 'marketeria_project', array(
            'labels' => array(
                'name'          => __('Tipos de Projeto', 'marketeria-core'),
                'singular_name' => __('Tipo de Projeto', 'marketeria-core'),
            ),
            'hierarchical'      => true,
            'show_in_rest'      => true,
            'show_admin_column' => true,
            'rewrite'           => array('slug' => 'tipo-projeto'),
        ));
    }
    
    /**
     * Adicionar menu de administração
     */
    public function add_admin_menu() {
        add_menu_page(
            __('Marketeria', 'marketeria-core'),
            __('Marketeria', 'marketeria-core'),
            'manage_options',
            'marketeria-settings',
            array($this, 'settings_page'),
            'dashicons-building',
            3
        );
    }
    
    /**
     * Registrar configurações
     */
    public function register_settings() {
        register_setting('marketeria_settings', 'marketeria_company_info');
        register_setting('marketeria_settings', 'marketeria_contact_email');
        register_setting('marketeria_settings', 'marketeria_contact_phone');
        register_setting('marketeria_settings', 'marketeria_social_links');
    }
    
    /**
     * Página de configurações
     */
    public function settings_page() {
        ?>
        <div class="wrap">
            <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
            <h2><?php _e('Configurações da Marketeria', 'marketeria-core'); ?></h2>
            
            <form method="post" action="options.php">
                <?php
                settings_fields('marketeria_settings');
                do_settings_sections('marketeria_settings');
                ?>
                
                <table class="form-table">
                    <tr>
                        <th scope="row">
                            <label for="marketeria_company_info">
                                <?php _e('Informações da Empresa', 'marketeria-core'); ?>
                            </label>
                        </th>
                        <td>
                            <textarea id="marketeria_company_info" name="marketeria_company_info" rows="5" cols="50" class="large-text"><?php echo esc_textarea(get_option('marketeria_company_info')); ?></textarea>
                            <p class="description">
                                <?php _e('Adicione informações gerais sobre sua empresa', 'marketeria-core'); ?>
                            </p>
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row">
                            <label for="marketeria_contact_email">
                                <?php _e('E-mail de Contato', 'marketeria-core'); ?>
                            </label>
                        </th>
                        <td>
                            <input type="email" id="marketeria_contact_email" name="marketeria_contact_email" value="<?php echo esc_attr(get_option('marketeria_contact_email')); ?>" class="regular-text">
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row">
                            <label for="marketeria_contact_phone">
                                <?php _e('Telefone de Contato', 'marketeria-core'); ?>
                            </label>
                        </th>
                        <td>
                            <input type="text" id="marketeria_contact_phone" name="marketeria_contact_phone" value="<?php echo esc_attr(get_option('marketeria_contact_phone')); ?>" class="regular-text">
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row">
                            <label for="marketeria_social_links">
                                <?php _e('Links de Redes Sociais', 'marketeria-core'); ?>
                            </label>
                        </th>
                        <td>
                            <textarea id="marketeria_social_links" name="marketeria_social_links" rows="5" cols="50" class="large-text"><?php echo esc_textarea(get_option('marketeria_social_links')); ?></textarea>
                            <p class="description">
                                <?php _e('Adicione links das redes sociais (um por linha)', 'marketeria-core'); ?>
                            </p>
                        </td>
                    </tr>
                </table>
                
                <?php submit_button(); ?>
            </form>
            
            <hr>
            
            <h2><?php _e('Sobre a Versão Customizada', 'marketeria-core'); ?></h2>
            <p><?php _e('Este é o plugin principal da sua versão customizada do WordPress para Marketeria.', 'marketeria-core'); ?></p>
            <p><?php printf(__('Versão: %s', 'marketeria-core'), MARKETERIA_CORE_VERSION); ?></p>
            
            <div class="card">
                <h3><?php _e('Recursos Disponíveis', 'marketeria-core'); ?></h3>
                <ul>
                    <li><?php _e('✓ Tipos de post customizados (Projetos e Depoimentos)', 'marketeria-core'); ?></li>
                    <li><?php _e('✓ Taxonomias personalizadas', 'marketeria-core'); ?></li>
                    <li><?php _e('✓ Configurações da empresa', 'marketeria-core'); ?></li>
                    <li><?php _e('✓ Integração com o tema Marketeria', 'marketeria-core'); ?></li>
                </ul>
            </div>
        </div>
        <?php
    }
    
    /**
     * Adicionar branding customizado ao conteúdo
     */
    public function add_custom_branding($content) {
        // Apenas em posts single
        if (is_singular('post') && is_main_query()) {
            $company_info = get_option('marketeria_company_info');
            if ($company_info) {
                $content .= '<div class="marketeria-branding" style="margin-top: 30px; padding: 20px; background: #f9f9f9; border-left: 4px solid #0073aa;">';
                $content .= '<p><strong>' . __('Sobre a Marketeria:', 'marketeria-core') . '</strong></p>';
                $content .= '<p>' . esc_html($company_info) . '</p>';
                $content .= '</div>';
            }
        }
        return $content;
    }
}

// Inicializar o plugin
function marketeria_core_init() {
    return Marketeria_Core::get_instance();
}

// Hook de ativação
register_activation_hook(__FILE__, 'marketeria_core_activate');
function marketeria_core_activate() {
    // Flush rewrite rules na ativação
    Marketeria_Core::get_instance();
    flush_rewrite_rules();
}

// Hook de desativação
register_deactivation_hook(__FILE__, 'marketeria_core_deactivate');
function marketeria_core_deactivate() {
    flush_rewrite_rules();
}

// Iniciar o plugin
add_action('plugins_loaded', 'marketeria_core_init');
