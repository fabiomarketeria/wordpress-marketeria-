# Tema Marketeria

## Descrição

O Tema Marketeria é um tema WordPress totalmente personalizado desenvolvido especificamente para a empresa Marketeria. Este tema demonstra como criar uma versão customizada do WordPress para sua empresa, incluindo branding corporativo, funcionalidades personalizadas e design otimizado.

## Características

### Design
- Layout responsivo para todos os dispositivos
- Design corporativo profissional
- Cores personalizáveis através do Customizador
- Tipografia otimizada para legibilidade

### Funcionalidades
- Suporte a título dinâmico
- Imagens destacadas
- HTML5 semântico
- Logo customizado
- Background customizado
- Cores customizadas no editor
- Menus de navegação (principal e rodapé)
- Áreas de widgets (sidebar e footer)

### Customização
- Cores da empresa editáveis
- Nome e slogan da empresa configuráveis
- Logo da empresa
- Customizador do WordPress integrado

## Instalação

1. Faça upload da pasta `marketeria` para `/wp-content/themes/`
2. Ative o tema através do menu 'Aparência > Temas' no WordPress
3. Configure o tema em 'Aparência > Personalizar'

## Estrutura de Arquivos

```
marketeria/
├── style.css          # Estilos principais e informações do tema
├── functions.php      # Funcionalidades e configurações
├── index.php         # Template principal
├── header.php        # Template do cabeçalho
├── footer.php        # Template do rodapé
├── sidebar.php       # Template da sidebar
├── js/
│   └── main.js       # JavaScript customizado
└── README.md         # Este arquivo
```

## Customização

### Cores

As cores podem ser customizadas em:
**Aparência > Personalizar > Cores Marketeria**

Ou editando as variáveis CSS em `style.css`:

```css
:root {
    --marketeria-primary: #0073aa;
    --marketeria-secondary: #005177;
    --marketeria-accent: #00a0d2;
}
```

### Logo

Faça upload do logo da empresa em:
**Aparência > Personalizar > Identidade do Site > Logo**

### Menus

Configure os menus em:
**Aparência > Menus**

Localizações disponíveis:
- Menu Principal
- Menu do Rodapé

### Widgets

Adicione widgets nas áreas:
**Aparência > Widgets**

Áreas disponíveis:
- Sidebar Principal
- Rodapé

## Suporte a Plugins

Este tema funciona perfeitamente com:
- **Marketeria Core Plugin** (recomendado)
- WooCommerce
- Contact Form 7
- Yoast SEO
- Elementor
- E muitos outros plugins populares

## Requisitos

- WordPress 5.0 ou superior
- PHP 7.2 ou superior
- Navegadores modernos

## Créditos

- Desenvolvido para Marketeria
- Baseado nas melhores práticas do WordPress
- Ícones: Dashicons (incluído no WordPress)

## Licença

GPL v2 ou posterior

## Suporte

Para suporte, consulte:
- README-MARKETERIA.md no diretório raiz
- [Documentação do WordPress](https://wordpress.org/documentation/)
- [Fórum de Suporte WordPress Brasil](https://br.forums.wordpress.org/)

## Changelog

### 1.0.0 - 2024-11-14
- Lançamento inicial
- Design corporativo completo
- Integração com Customizador
- Suporte a recursos modernos do WordPress
- Totalmente responsivo
- Tradução em Português
