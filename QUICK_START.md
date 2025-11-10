# 🚀 QUICK START - Carrinho Lumini

## ⏱️ 5 Minutos para Começar

### 1️⃣ Executar Migrations (1 min)
```bash
cd c:\laragon\www\Lumini-main
php spark migrate
```
**Esperado**: ✅ Tabelas criadas com sucesso

---

### 2️⃣ Iniciar o Servidor (30 seg)
```bash
# Opção A: Artisan builtin
php spark serve

# Opção B: Via Laragon
# Clique em "Lumini-main" em http://localhost
```
**Esperado**: Site abre em http://localhost:8080

---

### 3️⃣ Testar Carrinho (2 min)

#### A. Adicionar Produto
```
1. Acesse: http://localhost/Lumini-main/feminino
2. Clique em: "Adicionar ao Carrinho"
3. Veja: Notificação verde aparece ✅
4. Veja: Ícone 🛒 agora mostra "1"
```

#### B. Visualizar Carrinho
```
1. Clique no ícone 🛒
2. Veja: Página /carrinho carrega
3. Veja: Produto listado com preço
4. Veja: Total calculado corretamente
```

#### C. Modificar Carrinho
```
1. Use +/- para ajustar quantidade
2. Clique "Remover" para deletar item
3. Clique "Limpar Carrinho" para esvaziar
```

---

## 🎯 Checklist Básico

- [ ] Migrations rodaram
- [ ] Site abre em localhost
- [ ] Botão "Adicionar ao Carrinho" funciona
- [ ] Notificação aparece
- [ ] Ícone atualiza contador
- [ ] Página /carrinho abre
- [ ] Itens listados corretamente
- [ ] Total correto

---

## 🔗 URLs Principais

```
Home:           http://localhost/Lumini-main
Feminino:       http://localhost/Lumini-main/feminino
Masculino:      http://localhost/Lumini-main/masculino
Infantil:       http://localhost/Lumini-main/infantil
Acessórios:     http://localhost/Lumini-main/acessorios
Ofertas:        http://localhost/Lumini-main/ofertas
Carrinho:       http://localhost/Lumini-main/carrinho
```

---

## 📱 Testar em Diferentes Telas

### Desktop
```
F12 → Desabilitar "Device Simulation" → Ver layout desktop
```

### Mobile
```
F12 → Ctrl+Shift+M → Testar responsividade
```

### Tablet
```
F12 → Dimensions: 768x1024 → Testar tablet
```

---

## 💻 DevTools - Inspecionar

### Network (verificar requests)
```
1. F12 → Network tab
2. Clique "Adicionar ao Carrinho"
3. Veja POST request em /carrinho/adicionar/ID
4. Response deve ser JSON com sucesso
```

### Console (testar diretamente)
```javascript
// Adicionar produto
adicionarAoCarrinho(1);

// Ver carrinho (API)
fetch('http://localhost/Lumini-main/carrinho/visualizar')
  .then(r => r.json())
  .then(d => console.log(d));
```

---

## ❌ Se Algo Não Funcionar

### Erro: "Tabelas não existem"
```bash
php spark migrate:refresh
php spark migrate
```

### Erro: "Arquivo não encontrado"
```bash
# Verifique se está em c:\laragon\www\Lumini-main
cd c:\laragon\www\Lumini-main
dir
```

### Erro: "Conexão com banco falhou"
```bash
# Verifique se MariaDB/MySQL está rodando
# Laragon: Menu → MySQL → Start

# Ou teste com
php spark db:connect
```

### Erro: "Função não existe"
```bash
# Limpe cache
php spark cache:clear
php spark view:cache clear
```

---

## 📊 Estrutura Rápida

```
Lumini-main/
├── app/
│   ├── Controllers/
│   │   ├── CarrinhoController.php ✨ NOVO
│   │   └── Lumini.php (atualizado)
│   ├── Models/
│   │   ├── CarrinhoModel.php ✨ NOVO
│   │   ├── CarrinhoItemModel.php ✨ NOVO
│   │   └── ...
│   ├── Views/
│   │   ├── carrinho.php ✨ NOVO
│   │   ├── feminino.php (atualizado)
│   │   └── ...
│   ├── Config/
│   │   └── Routes.php (atualizado)
│   └── Database/Migrations/
│       └── 2025-11-10-... (corrigido)
│
├── public/
│   └── assets/js/
│       └── carrinho.js ✨ NOVO
│
└── README_CARRINHO.md ✨ NOVO
```

---

## 🎮 Comandos Úteis

```bash
# Status das migrations
php spark migrate:status

# Rollback (desfazer)
php spark migrate:rollback

# Refresh (limpar e recriar)
php spark migrate:refresh

# Ver rotas
php spark routes

# Listar controllers
php spark list controllers

# Gerar novo controller
php spark make:controller MeuController

# Gerar novo model
php spark make:model MeuModel

# Modo desenvolvimento
ENVIRONMENT=development

# Modo produção
ENVIRONMENT=production
```

---

## 🔗 Links Úteis

- CodeIgniter 4: https://codeigniter.com/
- Documentation: https://codeigniter4.github.io/
- REST: https://codeigniter4.github.io/incoming/restful/
- Database: https://codeigniter4.github.io/database/

---

## 💡 Dicas

1. **Sempre** limpe cache após changes grandes
2. **Use** DevTools Console para debug rápido
3. **Teste** em modo incógnito para novo usuário
4. **Monitore** `writable/logs/` para erros
5. **Verifique** banco com `php spark db:connect`

---

## 📞 Documentação Completa

Para mais detalhes:
- 📖 `CARRINHO_CORRECOES.md` - Detalhes técnicos
- 🧪 `GUIA_TESTES.md` - Procedimentos de teste
- 📋 `README_CARRINHO.md` - Resumo completo

---

## ✅ Pronto!

Se tudo funcionou, você tem um **carrinho de compras completamente funcional** 🎉

```
ADICIONAR AO CARRINHO ➜ VER CARRINHO ➜ MODIFICAR ➜ LIMPAR
```

**Próximo passo**: Implementar autenticação e checkout!

---

**Boa sorte! 🚀**

