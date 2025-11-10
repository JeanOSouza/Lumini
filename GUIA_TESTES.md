# 🧪 Guia de Testes - Sistema de Carrinho

## ✨ Passo a Passo para Testar

### 1️⃣ **Preparação do Banco de Dados**

```bash
# No terminal, execute as migrations
php spark migrate

# Se houver erro anterior, execute o rollback primeiro:
# php spark migrate:refresh
```

### 2️⃣ **Verificar se o banco foi criado**

Execute no seu cliente MySQL/MariaDB:
```sql
-- Verificar tabelas criadas
SHOW TABLES;

-- Verificar estrutura do carrinho
DESCRIBE carrinhos;
DESCRIBE carrinho_itens;
DESCRIBE produtos;
```

---

## 🧪 Testes Funcionais

### Teste 1: Adicionar Produto ao Carrinho
1. Abra `http://localhost/Lumini-main/feminino`
2. Clique em "Adicionar ao Carrinho" em qualquer produto
3. ✅ Deve exibir notificação: "Vestido Floral adicionado ao carrinho!"
4. ✅ Ícone do carrinho deve mostrar contador (🛒 1)

### Teste 2: Visualizar Carrinho
1. Clique no ícone 🛒 no header
2. Deve abrir `/carrinho` com itens listados
3. ✅ Mostrar: Imagem, Nome, Preço, Quantidade, Subtotal

### Teste 3: Aumentar Quantidade
1. Na página do carrinho, clique no botão "+" 
2. Deve aumentar quantidade em 1
3. ✅ Subtotal deve ser recalculado

### Teste 4: Diminuir Quantidade
1. Na página do carrinho, clique no botão "-"
2. Se quantidade chegar a 0, deve remover o item
3. ✅ Total deve atualizar

### Teste 5: Remover Item
1. Clique no botão "Remover" de um item
2. Deve aparecer confirmação
3. ✅ Item deve desaparecer do carrinho

### Teste 6: Limpar Carrinho
1. Clique em "Limpar Carrinho"
2. Deve aparecer confirmação
3. ✅ Carrinho deve ficar vazio

### Teste 7: Produtos Múltiplos
1. Adicione produtos de diferentes categorias:
   - Feminino (feminino.php)
   - Masculino (masculino.php)
   - Infantil (infantil.php)
   - Acessórios (acessorios.php)
2. ✅ Todos devem estar no mesmo carrinho

---

## 🔍 Testes Técnicos (DevTools)

### Network Tab
1. Abra DevTools (F12)
2. Vá para a aba "Network"
3. Clique em "Adicionar ao Carrinho"
4. ✅ Deve aparecer POST request para `/carrinho/adicionar/1`
5. ✅ Response deve ser JSON com status sucesso

### Console
```javascript
// Testar função do carrinho
adicionarAoCarrinho(1);
// Deve exibir notificação

// Verificar requisição
fetch('http://localhost/Lumini-main/carrinho/visualizar')
  .then(r => r.json())
  .then(d => console.log(d));
// Deve retornar objeto com itens e total
```

### Storage
1. Abra DevTools > Application > Cookies
2. Verifique se `ci_session` está presente
3. ✅ Deve existir cookie de sessão

---

## 📱 Testes Responsivos

### Desktop
- [ ] Produtos em grid 4 colunas
- [ ] Carrinho com layout tabular
- [ ] Botões/inputs com tamanho adequado

### Tablet
- [ ] Produtos em grid 2-3 colunas
- [ ] Carrinho adaptado
- [ ] Menu responsivo

### Mobile
- [ ] Produtos em 1 coluna
- [ ] Carrinho com scroll horizontal se necessário
- [ ] Botões grandes o suficiente para touch

---

## ⚠️ Testes de Erro

### Sem Produtos no Carrinho
1. Abra `/carrinho` (novo browser/limpar storage)
2. ✅ Deve exibir "Seu carrinho está vazio"
3. ✅ Deve ter botão para "Voltar às Compras"

### Quantidade 0
1. Tente setar quantidade para 0 manualmente
2. ✅ Deve remover o item

### Produto Não Existe
1. Tente acessar `/carrinho/adicionar/9999`
2. ✅ Deve retornar erro "Produto não encontrado"

---

## 📊 Testes de Dados

### Verificar Banco de Dados

```sql
-- Ver carrinhos criados
SELECT * FROM carrinhos;

-- Ver itens do carrinho
SELECT ci.*, p.nome, p.preco 
FROM carrinho_itens ci
JOIN produtos p ON ci.produto_id = p.id;

-- Calcular total por carrinho
SELECT ci.carrinho_id, SUM(ci.subtotal) as total
FROM carrinho_itens ci
GROUP BY ci.carrinho_id;
```

---

## 🔒 Segurança

### Testar Validações
1. ✅ Não deve permitir quantidade negativa
2. ✅ Não deve permitir produto inexistente
3. ✅ Deve validar usuario_id (fixo em 1)
4. ✅ Deve usar CSRF protection (se ativado)

---

## 📝 Checklist Final

- [ ] Migrations executadas sem erro
- [ ] Tabelas criadas no banco
- [ ] Adicionar ao carrinho funciona
- [ ] Visualizar carrinho funciona
- [ ] Atualizar quantidade funciona
- [ ] Remover item funciona
- [ ] Limpar carrinho funciona
- [ ] Notificações exibidas
- [ ] Total calculado corretamente
- [ ] Responsivo em mobile/tablet
- [ ] Sem erros no console
- [ ] Sem erros no banco de dados

---

## 🚨 Se Algo Não Funcionar

### 1. Verifique Migrations
```bash
php spark migrate:status
php spark migrate --show-tree
```

### 2. Verifique Logs
```bash
# Ver logs de erro
tail -f writable/logs/log-*.log
```

### 3. Teste Rotas
```bash
# No console, teste:
php spark routes
# Deve listar /carrinho/adicionar, /carrinho/visualizar, etc.
```

### 4. Teste Conexão BD
```php
// Em um controller temporário:
$db = \Config\Database::connect();
echo $db->conn_id;
```

### 5. Limpe Cache
```bash
php spark cache:clear
php spark view:cache clear
```

---

## 💡 Dicas

- Use o DevTools Console para testes rápidos
- Abra em abas incógnito para testar como novo usuário
- Teste com JavaScript desativado (fallback)
- Teste em navegadores diferentes

---

**Bom teste! 🎉**

