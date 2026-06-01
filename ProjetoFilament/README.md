# 🧵 Sistema de Gestão de Confecção

Aplicação web desenvolvida com **Laravel 13** + **Filament 5** para gerenciamento de uma confecção têxtil, com controle de clientes, fornecedores, produtos, insumos, pedidos e movimentação de estoque.

---

## 🏗️ Arquitetura

### Stack
- **Backend:** PHP 8.3 + Laravel 13
- **Frontend Admin:** Filament 5 (PHP puro, sem Vue/React)
- **Banco:** MySQL (`confeccaota2`)
- **Autenticação:** Spatie Laravel Permission (RBAC)
- **E-mail:** Mailpit (SMTP em ambiente de desenvolvimento) → `http://localhost:8025`

---

## 📂 Estrutura do Projeto

### Models (Camada de Dados)

| Model | Tabela | Descrição |
|-------|--------|-----------|
| `User` | `users` | Usuários do sistema (autenticação + permissões Spatie) |
| `Cliente` | `clientes` | Clientes da confecção (nome, email, telefone) |
| `Fornecedores` | `fornecedores` | Fornecedores de materiais |
| `Produto` | `produtos` | Produtos comercializados (matéria-prima ou item final) |
| `Insumo` | `insumos` | Matérias-primas / insumos |
| `Pedido` | `pedidos` | Pedidos dos clientes (status, valor_total) |
| `ItemPedido` | `item_pedidos` | Itens que compõem cada pedido (produto, qtd, preço) |
| `MovimentacaoEstoque` | `movimentacao_estoques` | Entradas e saídas de estoque |
| `EmailLog` | `email_logs` | **Histórico de e-mails enviados** (nova funcionalidade) |

### Relacionamentos Principais

```
Cliente (1) ──────────── (N) Pedido
Pedido (1) ───────────── (N) ItemPedido
ItemPedido (N) ───────── (1) Produto
Produto (1) ──────────── (N) MovimentacaoEstoque
Pedido (1) ───────────── (N) EmailLog
```

---

## 🖥️ Painel Administrativo (Filament)

Acessível em `/admin`, dividido em **grupos de navegação**:

### 🔐 Permissões (Spatie)
- **Roles** – Gerenciar papéis (admin, operador, etc.)
- **Permissions** – Gerenciar permissões específicas
- **Users** – Gerenciar usuários do sistema

### 📋 Cadastros Gerais
- **Clientes** – CRUD completo (nome, email, telefone)
- **Fornecedores** – CRUD completo
- **Produtos** – CRUD completo
- **Insumos** – CRUD completo

### 📦 Estoque
- **Movimentações** – Registro de entradas/saídas de produtos

### 💰 Vendas
- **Pedidos** – Criação e edição de pedidos:
  - Seleção de cliente
  - Itens do pedido com produto, quantidade e preço unitário
  - **Cálculo automático** do valor total (soma qtd × preço)
  - Status: `Pendente` → `Em produção` → `Finalizado`
  - **Ao mudar o status → e-mail automático para o cliente** 📧
- **E-mails** – Histórico de e-mails enviados:
  - Pedido relacionado, cliente, status anterior/novo, data de envio

### 📊 Widgets
- Gráfico de exemplo na dashboard (valores mensais)

---

## ✉️ Sistema de Notificações (Mailpit)

### Como funciona
1. No **painel admin**, ao editar um pedido e alterar seu **status**
2. O sistema captura o status **anterior** antes de salvar
3. Após salvar, compara com o **novo** status
4. Se houve mudança e o cliente tem **e-mail cadastrado**:
   - Um e-mail HTML é enviado via Mailpit (SMTP porta 1025)
   - Um registro é salvo na tabela `email_logs`

### Template do e-mail
- Nome do cliente
- Status atual com badge colorido
- Valor total do pedido
- Tabela com todos os itens (produto, quantidade, preço, subtotal)

### Logs de e-mail
Disponível em **admin/email-logs** com:
- Número do pedido | Cliente | E-mail | Status anterior | Status novo | Assunto | Data de envio

---

## ⚙️ Configuração do Ambiente

### .env (Mailpit)
```env
MAIL_MAILER=smtp
MAIL_HOST=127.0.0.1
MAIL_PORT=1025
MAIL_FROM_ADDRESS="confeccao@example.com"
```

Mailpit UI: `http://localhost:8025`

### Banco de Dados
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=confeccaota2
DB_USERNAME=root
DB_PASSWORD=senaisp
```

---

## 🚀 Como Executar

```bash
# 1. Instalar dependências
composer install
npm install && npm run build

# 2. Configurar .env (copiar de .env.example)
cp .env.example .env
php artisan key:generate

# 3. Rodar migrations
php artisan migrate

# 4. Iniciar servidor
php artisan serve

# 5. Acessar
# Painel: http://localhost/admin
# Mailpit: http://localhost:8025
```

---

## 🧪 Comandos Úteis

```bash
# Testar envio de e-mail via Mailpit
php artisan mail:test

# Limpar cache
php artisan optimize:clear

# Listar rotas admin
php artisan route:list --path=admin