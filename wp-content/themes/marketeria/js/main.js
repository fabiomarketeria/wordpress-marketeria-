/**
 * Marketeria Theme Main JavaScript
 * 
 * @package Marketeria
 * @since 1.0.0
 */

(function() {
    'use strict';
    
    // Função de inicialização quando o DOM estiver pronto
    function init() {
        console.log('Tema Marketeria carregado com sucesso!');
        
        // Adicionar classe de JavaScript ativo
        document.body.classList.add('js-enabled');
        
        // Menu mobile toggle (se necessário no futuro)
        setupMobileMenu();
        
        // Smooth scroll para links de âncora
        setupSmoothScroll();
    }
    
    /**
     * Configurar menu mobile
     */
    function setupMobileMenu() {
        const nav = document.querySelector('.main-navigation');
        if (!nav) return;
        
        // Criar botão de toggle se não existir
        if (!document.querySelector('.menu-toggle')) {
            const toggleButton = document.createElement('button');
            toggleButton.className = 'menu-toggle';
            toggleButton.setAttribute('aria-expanded', 'false');
            toggleButton.innerHTML = '<span class="menu-icon">&#9776;</span>';
            
            nav.parentNode.insertBefore(toggleButton, nav);
            
            toggleButton.addEventListener('click', function() {
                const expanded = this.getAttribute('aria-expanded') === 'true';
                this.setAttribute('aria-expanded', !expanded);
                nav.classList.toggle('toggled');
            });
        }
    }
    
    /**
     * Configurar scroll suave
     */
    function setupSmoothScroll() {
        const links = document.querySelectorAll('a[href^="#"]');
        
        links.forEach(link => {
            link.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if (href === '#') return;
                
                const target = document.querySelector(href);
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    }
    
    // Inicializar quando o DOM estiver pronto
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
    
})();
