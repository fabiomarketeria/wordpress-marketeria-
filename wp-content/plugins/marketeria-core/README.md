# Plugin Marketeria Core

## Descrição

O Marketeria Core é um plugin essencial que adiciona funcionalidades customizadas específicas para a empresa Marketeria. Este plugin trabalha em conjunto com o Tema Marketeria para fornecer uma experiência WordPress completamente personalizada.

## Funcionalidades

### Tipos de Post Customizados

#### Projetos (`marketeria_project`)
- Exiba o portfólio de projetos da sua empresa
- Suporta: título, editor, imagem destacada, excerpt, campos customizados
- URL amigável: `/projetos/`
- Taxonomia: Tipos de Projeto

#### Depoimentos (`marketeria_testimonial`)
- Mostre feedback e avaliações de clientes
- Suporta: título, editor, imagem destacada
- URL amigável: `/depoimentos/`

### Painel de Configurações

Acesse em: **WordPress Admin > Marketeria**

Configure:
- ✅ Informações da empresa
- ✅ E-mail de contato
- ✅ Telefone de contato
- ✅ Links de redes sociais

### Recursos Adicionais
- Branding automático em posts
- Integração com REST API
- Suporte a Gutenberg (editor de blocos)
- Campos customizados prontos para uso

## Instalação

1. Faça upload da pasta `marketeria-core` para `/wp-content/plugins/`
2. Ative o plugin através do menu 'Plugins' no WordPress
3. Configure o plugin em 'Marketeria' no menu administrativo

## Como Usar

### Adicionar Projetos

1. Vá em **Projetos > Adicionar Novo**
2. Preencha:
   - Título do projeto
   - Descrição completa
   - Imagem destacada
   - Tipo de projeto (taxonomia)
3. Publique

### Adicionar Depoimentos

1. Vá em **Depoimentos > Adicionar Novo**
2. Preencha:
   - Nome do cliente
   - Depoimento
   - Foto do cliente (imagem destacada)
3. Publique

### Exibir em Seu Site

Use estas queries para exibir os custom post types:

```php
// Listar todos os projetos
$projetos = new WP_Query(array(
    'post_type' => 'marketeria_project',
    'posts_per_page' => 10
));

// Listar depoimentos
$depoimentos = new WP_Query(array(
    'post_type' => 'marketeria_testimonial',
    'posts_per_page' => 5
));
```

## Shortcodes (Futuro)

Em desenvolvimento para futuras versões:
- `[marketeria_projects]` - Exibir projetos
- `[marketeria_testimonials]` - Exibir depoimentos
- `[marketeria_contact]` - Formulário de contato

## Estendendo o Plugin

### Adicionar Novos Custom Post Types

```php
add_action('init', function() {
    register_post_type('seu_custom_type', array(
        'labels' => array(
            'name' => 'Seu Tipo',
        ),
        'public' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
    ));
});
```

### Adicionar Custom Fields

```php
add_action('add_meta_boxes', function() {
    add_meta_box(
        'custom_field_box',
        'Campos Adicionais',
        'render_custom_fields',
        'marketeria_project'
    );
});
```

## Hooks e Filtros

### Filters Disponíveis

```php
// Modificar informações da empresa
apply_filters('marketeria_company_info', $info);

// Modificar branding de posts
apply_filters('marketeria_post_branding', $content);
```

### Actions Disponíveis

```php
// Executar após registrar post types
do_action('marketeria_post_types_registered');

// Executar após carregar configurações
do_action('marketeria_settings_loaded');
```

## Requisitos

- WordPress 5.0 ou superior
- PHP 7.2 ou superior
- Tema Marketeria (recomendado, mas não obrigatório)

## Compatibilidade

Testado com:
- WordPress 7.0
- PHP 8.3
- Tema Marketeria
- Principais plugins populares

## Estrutura do Plugin

```
marketeria-core/
├── marketeria-core.php    # Arquivo principal
├── README.md             # Este arquivo
└── languages/            # Arquivos de tradução (futuro)
```

## Segurança

- ✅ Validação de entrada de dados
- ✅ Sanitização de saída
- ✅ Proteção contra acesso direto
- ✅ Nonces em formulários
- ✅ Verificação de capabilities

## Roadmap

### Versão 1.1.0
- [ ] Adicionar shortcodes
- [ ] Meta boxes para custom fields
- [ ] Widget para depoimentos
- [ ] Importador/Exportador de conteúdo

### Versão 1.2.0
- [ ] Integração com WooCommerce
- [ ] API REST customizada
- [ ] Relatórios e analytics
- [ ] Formulários avançados

### Versão 2.0.0
- [ ] Sistema de CRM básico
- [ ] Integração com e-mail marketing
- [ ] Dashboard personalizado
- [ ] Automações

## FAQ

### Este plugin funciona sem o Tema Marketeria?
Sim, mas é recomendado usar ambos juntos para melhor experiência.

### Posso modificar os custom post types?
Sim! O código é aberto e pode ser modificado conforme sua necessidade.

### O plugin é traduzível?
Sim, está preparado para tradução com text domain 'marketeria-core'.

### Como desinstalar?
Desative o plugin normalmente. Os dados dos custom post types permanecerão no banco de dados.

## Suporte

- **Documentação**: README-MARKETERIA.md no diretório raiz
- **WordPress**: https://wordpress.org/support/
- **Desenvolvimento**: https://developer.wordpress.org/

## Licença

GPL v2 ou posterior - mesma licença do WordPress

## Créditos

- Desenvolvido para Marketeria
- Segue WordPress Coding Standards
- Usa WordPress API nativa

## Changelog

### 1.0.0 - 2024-11-14
- ✅ Lançamento inicial
- ✅ Custom Post Types: Projetos e Depoimentos
- ✅ Taxonomia: Tipos de Projeto
- ✅ Painel de configurações
- ✅ Integração com REST API
- ✅ Suporte a Gutenberg
- ✅ Branding automático em posts

---

**Marketeria Core** - Funcionalidades empresariais para seu WordPress customizado
