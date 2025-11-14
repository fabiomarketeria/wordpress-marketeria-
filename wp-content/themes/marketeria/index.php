<?php
/**
 * Template principal
 * 
 * @package Marketeria
 * @since 1.0.0
 */

get_header(); ?>

<div class="site-content">
    <main id="main" class="content-area">
        
        <?php if (is_front_page()) : ?>
            <!-- Seção em destaque para a página inicial -->
            <div class="marketeria-featured-section">
                <h2><?php echo esc_html(get_theme_mod('marketeria_company_slogan', 'Bem-vindo à Marketeria')); ?></h2>
                <p><?php _e('Sua versão personalizada do WordPress para negócios', 'marketeria'); ?></p>
            </div>
        <?php endif; ?>
        
        <?php
        if (have_posts()) :
            while (have_posts()) :
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <h1 class="entry-title">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h1>
                        <div class="entry-meta">
                            <span class="posted-on">
                                <?php _e('Publicado em', 'marketeria'); ?> 
                                <?php echo get_the_date(); ?>
                            </span>
                            <span class="byline">
                                <?php _e('por', 'marketeria'); ?> 
                                <?php the_author(); ?>
                            </span>
                        </div>
                    </header>
                    
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="post-thumbnail">
                            <?php the_post_thumbnail('large'); ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="entry-content">
                        <?php
                        if (is_singular()) :
                            the_content();
                        else :
                            the_excerpt();
                        endif;
                        ?>
                    </div>
                    
                    <?php if (is_singular()) : ?>
                        <footer class="entry-footer">
                            <?php
                            $categories = get_the_category();
                            if ($categories) {
                                echo '<div class="cat-links">';
                                _e('Categorias: ', 'marketeria');
                                foreach ($categories as $category) {
                                    echo '<a href="' . esc_url(get_category_link($category->term_id)) . '">' 
                                         . esc_html($category->name) . '</a> ';
                                }
                                echo '</div>';
                            }
                            
                            $tags = get_the_tags();
                            if ($tags) {
                                echo '<div class="tags-links">';
                                _e('Tags: ', 'marketeria');
                                foreach ($tags as $tag) {
                                    echo '<a href="' . esc_url(get_tag_link($tag->term_id)) . '">' 
                                         . esc_html($tag->name) . '</a> ';
                                }
                                echo '</div>';
                            }
                            ?>
                        </footer>
                    <?php endif; ?>
                </article>
                <?php
            endwhile;
            
            // Navegação de paginação
            the_posts_pagination(array(
                'mid_size'  => 2,
                'prev_text' => __('&laquo; Anterior', 'marketeria'),
                'next_text' => __('Próximo &raquo;', 'marketeria'),
            ));
            
        else :
            ?>
            <div class="no-results">
                <h2><?php _e('Nenhum conteúdo encontrado', 'marketeria'); ?></h2>
                <p><?php _e('Desculpe, mas não há conteúdo disponível no momento.', 'marketeria'); ?></p>
            </div>
            <?php
        endif;
        ?>
        
    </main>
    
    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
