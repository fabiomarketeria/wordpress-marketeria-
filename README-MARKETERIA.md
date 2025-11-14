# WordPress Customizado para Marketeria

## 🎯 Sim, você pode criar uma versão customizada do WordPress para sua empresa!

Este repositório contém uma versão totalmente customizada do WordPress especialmente desenvolvida para a **Marketeria**. A resposta à pergunta "posso criar uma versão customizada do WordPress para minha empresa?" é: **SIM!** E este é um exemplo completo de como fazer isso.

## 📋 O que foi customizado?

### 1. Tema Personalizado: Marketeria
Um tema WordPress completo desenvolvido especificamente para sua empresa, localizado em:
```
wp-content/themes/marketeria/
```

**Recursos do tema:**
- ✅ Design corporativo com cores personalizáveis
- ✅ Branding da empresa integrado
- ✅ Layout responsivo para todos os dispositivos
- ✅ Suporte a logo customizado
- ✅ Menus de navegação personalizados
- ✅ Áreas de widgets flexíveis
- ✅ Customizador do WordPress integrado
- ✅ Totalmente traduzido para Português

### 2. Plugin Principal: Marketeria Core
Um plugin customizado com funcionalidades específicas para seu negócio:
```
wp-content/plugins/marketeria-core/
```

**Recursos do plugin:**
- ✅ Tipos de post customizados:
  - **Projetos**: Para exibir portfólio de projetos da empresa
  - **Depoimentos**: Para mostrar feedback de clientes
- ✅ Taxonomias personalizadas
- ✅ Painel de configurações da empresa
- ✅ Campos customizados para informações corporativas
- ✅ Integração completa com o tema Marketeria

## 🚀 Como usar esta versão customizada?

### Instalação

#### 1. Configurar o WordPress
```bash
# Se ainda não configurou, crie o arquivo wp-config.php
cp wp-config-sample.php wp-config.php
```

Edite `wp-config.php` com as informações do seu banco de dados.

#### 2. Instalar o WordPress
Acesse `http://seu-dominio.com/wp-admin/install.php` e siga as instruções.

#### 3. Ativar o Tema Marketeria
1. Faça login no painel administrativo (wp-admin)
2. Vá em **Aparência > Temas**
3. Ative o tema **Marketeria**

#### 4. Ativar o Plugin Marketeria Core
1. Vá em **Plugins**
2. Ative o plugin **Marketeria Core**

### Configuração Inicial

#### Personalizar o Tema
1. Acesse **Aparência > Personalizar**
2. Configure:
   - **Cores Marketeria**: Escolha suas cores corporativas
   - **Informações da Empresa**: Nome e slogan da empresa
   - **Logo**: Faça upload do logo da sua empresa
   - **Menus**: Configure os menus de navegação

#### Configurar o Plugin
1. Acesse **Marketeria** no menu administrativo
2. Configure:
   - Informações da empresa
   - E-mail de contato
   - Telefone
   - Links de redes sociais

## 🎨 Personalizações Disponíveis

### Cores do Tema
O tema usa variáveis CSS que podem ser facilmente customizadas:

```css
:root {
    --marketeria-primary: #0073aa;    /* Cor primária */
    --marketeria-secondary: #005177;  /* Cor secundária */
    --marketeria-accent: #00a0d2;     /* Cor de destaque */
}
```

Essas cores podem ser alteradas através do Customizador do WordPress.

### Estrutura de Arquivos do Tema

```
wp-content/themes/marketeria/
├── style.css           # Estilos principais
├── functions.php       # Funcionalidades do tema
├── index.php          # Template principal
├── header.php         # Cabeçalho
├── footer.php         # Rodapé
├── sidebar.php        # Barra lateral
└── js/
    └── main.js        # JavaScript customizado
```

### Hooks e Filtros Disponíveis

#### Filters
```php
// Personalizar comprimento do excerpt
add_filter('excerpt_length', 'custom_excerpt_length');

// Personalizar "leia mais"
add_filter('excerpt_more', 'custom_excerpt_more');

// Adicionar classes ao body
add_filter('body_class', 'custom_body_classes');
```

#### Actions
```php
// Adicionar scripts customizados
add_action('wp_enqueue_scripts', 'custom_scripts');

// Registrar widgets
add_action('widgets_init', 'custom_widgets');
```

## 📝 Como Estender a Customização?

### Adicionar Novos Tipos de Post

Edite `wp-content/plugins/marketeria-core/marketeria-core.php`:

```php
register_post_type('seu_tipo', array(
    'labels' => array(
        'name' => 'Seu Tipo',
        'singular_name' => 'Item',
    ),
    'public' => true,
    'has_archive' => true,
    'supports' => array('title', 'editor', 'thumbnail'),
));
```

### Adicionar Novos Widgets

No `functions.php` do tema:

```php
function custom_widget_area() {
    register_sidebar(array(
        'name' => 'Nova Área de Widget',
        'id' => 'custom-widget-area',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
    ));
}
add_action('widgets_init', 'custom_widget_area');
```

### Criar Templates Customizados

Crie novos arquivos no diretório do tema:
- `page-template-name.php` - Para templates de página
- `single-custom-post.php` - Para single de custom post types
- `archive-custom-post.php` - Para arquivos de custom post types

## 🔧 Manutenção e Atualizações

### Backup Regular
```bash
# Backup do banco de dados
mysqldump -u usuario -p nome_banco > backup.sql

# Backup dos arquivos
tar -czf backup-wordpress.tar.gz wp-content/
```

### Atualizações do WordPress Core
**IMPORTANTE**: Suas customizações estão em:
- `wp-content/themes/marketeria/` (tema)
- `wp-content/plugins/marketeria-core/` (plugin)

Estes arquivos **NÃO serão afetados** pelas atualizações do WordPress core.

### Versionamento
Mantenha suas customizações no Git:
```bash
git add wp-content/themes/marketeria/
git add wp-content/plugins/marketeria-core/
git commit -m "Suas alterações"
```

## 🎓 Melhores Práticas

### 1. Nunca Edite os Arquivos Core do WordPress
Todas as customizações devem ser feitas através de:
- Temas (child themes se necessário)
- Plugins personalizados
- `wp-config.php` para configurações

### 2. Use Child Themes para Modificações Extensivas
Se precisar modificar muito o tema:
```
wp-content/themes/marketeria-child/
```

### 3. Mantenha o Código Organizado
- Comente seu código
- Use nomes descritivos
- Siga os padrões do WordPress Coding Standards

### 4. Teste em Ambiente de Desenvolvimento
Sempre teste mudanças em um ambiente local antes de aplicar em produção.

### 5. Segurança
- Mantenha WordPress, tema e plugins atualizados
- Use senhas fortes
- Faça backups regulares
- Use SSL (HTTPS)

## 📚 Recursos Adicionais

### Documentação Oficial
- [WordPress Developer Handbook](https://developer.wordpress.org/)
- [Theme Handbook](https://developer.wordpress.org/themes/)
- [Plugin Handbook](https://developer.wordpress.org/plugins/)

### Comunidade
- [WordPress Brasil](https://br.wordpress.org/)
- [Fórum de Suporte](https://br.forums.wordpress.org/)
- [WordPress em Português](https://www.facebook.com/groups/wordpress.brasil/)

## 🤝 Suporte

Para suporte com suas customizações do WordPress:

1. **Documentação**: Consulte este README
2. **Fórum WordPress**: [br.forums.wordpress.org](https://br.forums.wordpress.org/)
3. **Stack Overflow**: Tag `wordpress`
4. **WordPress.org**: [Documentação oficial](https://wordpress.org/documentation/)

## ⚖️ Licença

Esta customização do WordPress mantém a licença GPL v2 ou posterior, assim como o WordPress core.

- **WordPress Core**: GPL v2+
- **Tema Marketeria**: GPL v2+
- **Plugin Marketeria Core**: GPL v2+

Você é livre para:
- ✅ Usar comercialmente
- ✅ Modificar
- ✅ Distribuir
- ✅ Usar privadamente

## 🎉 Conclusão

**Sim, você PODE e DEVE criar uma versão customizada do WordPress para sua empresa!**

Este projeto demonstra como fazer isso de forma profissional, mantendo:
- ✅ Compatibilidade com atualizações do WordPress
- ✅ Código organizado e manutenível
- ✅ Boas práticas de desenvolvimento
- ✅ Facilidade de extensão e personalização

---

**Desenvolvido com ❤️ para a Marketeria**

*Versão 1.0.0 - Novembro 2024*
