# 📦 Instruções de Instalação - WordPress Marketeria

## 🎯 Objetivo
Este guia mostra como instalar e ativar as customizações da Marketeria no WordPress.

## ✅ Pré-requisitos

Antes de começar, certifique-se de ter:
- [ ] Servidor web (Apache/Nginx)
- [ ] PHP 7.2 ou superior (recomendado: PHP 8.3)
- [ ] MySQL 5.5.5 ou superior (recomendado: MySQL 8.0 ou MariaDB 10.6)
- [ ] Acesso FTP ou SSH ao servidor
- [ ] Banco de dados MySQL criado

## 📋 Passo a Passo

### 1️⃣ Preparar o Ambiente

#### Opção A: Servidor Local (Desenvolvimento)
```bash
# Usando XAMPP, WAMP, MAMP ou similar
# Copie este diretório para:
# - Windows: C:\xampp\htdocs\marketeria
# - Mac: /Applications/MAMP/htdocs/marketeria
# - Linux: /var/www/html/marketeria
```

#### Opção B: Servidor de Produção
```bash
# Via FTP: Faça upload de todos os arquivos
# Via SSH: Clone o repositório ou copie os arquivos
```

### 2️⃣ Criar o Banco de Dados

```sql
CREATE DATABASE marketeria_wp CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'marketeria_user'@'localhost' IDENTIFIED BY 'sua_senha_segura';
GRANT ALL PRIVILEGES ON marketeria_wp.* TO 'marketeria_user'@'localhost';
FLUSH PRIVILEGES;
```

### 3️⃣ Configurar o WordPress

```bash
# Copie o arquivo de configuração exemplo
cp wp-config-sample.php wp-config.php
```

Edite `wp-config.php` e configure:

```php
// Configurações do Banco de Dados
define('DB_NAME', 'marketeria_wp');
define('DB_USER', 'marketeria_user');
define('DB_PASSWORD', 'sua_senha_segura');
define('DB_HOST', 'localhost');
define('DB_CHARSET', 'utf8mb4');
define('DB_COLLATE', 'utf8mb4_unicode_ci');

// Gere suas chaves de segurança em:
// https://api.wordpress.org/secret-key/1.1/salt/
define('AUTH_KEY',         'coloque sua chave única aqui');
define('SECURE_AUTH_KEY',  'coloque sua chave única aqui');
// ... continue com todas as chaves
```

### 4️⃣ Executar a Instalação do WordPress

1. Acesse seu site no navegador:
   ```
   http://localhost/marketeria/
   ou
   http://seu-dominio.com/
   ```

2. Você será redirecionado para: `wp-admin/install.php`

3. Preencha as informações:
   - **Título do Site**: Marketeria
   - **Nome de usuário**: admin (ou seu preferido)
   - **Senha**: (use uma senha forte)
   - **Seu e-mail**: seu@email.com
   - **Visibilidade**: Marque ou desmarque conforme preferência

4. Clique em **Instalar WordPress**

5. Faça login com suas credenciais

### 5️⃣ Ativar o Tema Marketeria

1. No painel do WordPress, vá em: **Aparência > Temas**

2. Você verá o tema **Marketeria** listado

3. Clique em **Ativar**

4. Você verá a mensagem: "Novo tema ativado"

### 6️⃣ Ativar o Plugin Marketeria Core

1. No painel, vá em: **Plugins**

2. Encontre **Marketeria Core** na lista

3. Clique em **Ativar**

4. Você verá: "Plugin ativado"

### 7️⃣ Configurar as Customizações

#### Configurar o Tema

1. Vá em: **Aparência > Personalizar**

2. Configure cada seção:

   **Identidade do Site:**
   - Título do site: Marketeria
   - Slogan: Seu slogan aqui
   - Logo do site: Faça upload do logo (recomendado: PNG com fundo transparente)

   **Cores Marketeria:**
   - Cor Primária: #0073aa (ou sua cor)
   - Cor Secundária: #005177 (ou sua cor)

   **Informações da Empresa:**
   - Nome da Empresa: Marketeria
   - Slogan da Empresa: Sua empresa personalizada no WordPress

3. Clique em **Publicar** para salvar

#### Configurar o Plugin

1. Vá em: **Marketeria** (menu lateral)

2. Preencha:
   - **Informações da Empresa**: Descrição breve da empresa
   - **E-mail de Contato**: contato@marketeria.com
   - **Telefone de Contato**: (11) 1234-5678
   - **Links de Redes Sociais**: 
     ```
     https://facebook.com/marketeria
     https://instagram.com/marketeria
     https://linkedin.com/company/marketeria
     ```

3. Clique em **Salvar Alterações**

### 8️⃣ Criar Menus

1. Vá em: **Aparência > Menus**

2. Crie um novo menu:
   - Nome: Menu Principal
   - Localizações: Marque "Menu Principal"

3. Adicione páginas ao menu:
   - Início
   - Sobre
   - Serviços
   - Contato

4. Clique em **Salvar Menu**

### 9️⃣ Adicionar Widgets (Opcional)

1. Vá em: **Aparência > Widgets**

2. Arraste widgets para as áreas:
   - **Sidebar Principal**: Pesquisa, Posts Recentes, Categorias
   - **Rodapé**: Texto (informações da empresa)

### 🔟 Criar Conteúdo Inicial

#### Criar Páginas Básicas

1. **Página Inicial**
   - Vá em: **Páginas > Adicionar Nova**
   - Título: Início ou Bem-vindo
   - Adicione conteúdo de boas-vindas
   - Publique

2. **Página Sobre**
   - Título: Sobre a Marketeria
   - Conteúdo: História e missão da empresa
   - Publique

3. **Página de Contato**
   - Título: Contato
   - Adicione formulário de contato
   - Publique

#### Configurar Página Inicial Estática

1. Vá em: **Configurações > Leitura**
2. Selecione: "Uma página estática"
3. Página Inicial: Selecione a página "Início"
4. Página de Posts: Selecione ou crie página "Blog"
5. Salve as alterações

#### Adicionar Primeiro Projeto

1. Vá em: **Projetos > Adicionar Novo**
2. Título: Seu Primeiro Projeto
3. Adicione descrição e imagem
4. Publique

#### Adicionar Primeiro Depoimento

1. Vá em: **Depoimentos > Adicionar Novo**
2. Título: Nome do Cliente
3. Conteúdo: Depoimento do cliente
4. Imagem destacada: Foto do cliente
5. Publique

## 🔒 Configurações de Segurança

### 1. Remover arquivo de instalação (Recomendado)
```bash
rm wp-admin/install.php
```

### 2. Definir permissões corretas
```bash
# Diretórios
find . -type d -exec chmod 755 {} \;

# Arquivos
find . -type f -exec chmod 644 {} \;

# wp-config.php (mais restritivo)
chmod 600 wp-config.php
```

### 3. Proteger wp-config.php
Adicione ao `.htaccess`:
```apache
<files wp-config.php>
order allow,deny
deny from all
</files>
```

### 4. Instalar Plugin de Segurança (Recomendado)
- Wordfence Security
- iThemes Security
- Sucuri Security

## 🎨 Personalização Adicional

### Alterar Cores

Edite: `wp-content/themes/marketeria/style.css`

```css
:root {
    --marketeria-primary: #SUA_COR;
    --marketeria-secondary: #SUA_COR;
    --marketeria-accent: #SUA_COR;
}
```

### Adicionar Funcionalidades

Edite: `wp-content/plugins/marketeria-core/marketeria-core.php`

## ✅ Verificação Final

Checklist pós-instalação:

- [ ] WordPress instalado e funcionando
- [ ] Tema Marketeria ativado
- [ ] Plugin Marketeria Core ativado
- [ ] Logo da empresa adicionado
- [ ] Cores configuradas
- [ ] Informações da empresa preenchidas
- [ ] Menu principal criado
- [ ] Páginas básicas criadas
- [ ] Primeiro conteúdo publicado
- [ ] Configurações de permalink definidas (Configurações > Links Permanentes)
- [ ] SSL/HTTPS configurado (se em produção)
- [ ] Backup inicial criado

## 🆘 Solução de Problemas

### Erro: "Erro ao estabelecer conexão com banco de dados"
- Verifique credenciais em `wp-config.php`
- Confirme que o banco de dados existe
- Verifique se o MySQL está rodando

### Tema/Plugin não aparece
- Verifique permissões dos arquivos (755 para pastas, 644 para arquivos)
- Confirme estrutura de diretórios correta

### Erro 500
- Verifique logs de erro do PHP
- Aumente memory_limit no php.ini
- Desative outros plugins temporariamente

### Páginas não encontradas (404)
- Vá em: **Configurações > Links Permanentes**
- Clique em **Salvar Alterações** (isso regenera o .htaccess)

## 📞 Suporte

- **Documentação**: Leia `README-MARKETERIA.md` e `GUIA-RAPIDO.md`
- **WordPress Brasil**: https://br.wordpress.org/
- **Fórum de Suporte**: https://br.forums.wordpress.org/

## 🎉 Pronto!

Sua instalação do WordPress customizado para Marketeria está completa!

---

**Versão 1.0.0**

💡 **Dica**: Faça backups regulares do banco de dados e arquivos!
