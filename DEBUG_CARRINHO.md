# 🔧 Debug de URLs do Carrinho

## Diagnosticar Problema 404

Se você está recebendo erro `404 (Not Found)` ao adicionar ao carrinho, siga estes passos:

### 1. Verificar o Base URL Correto

Abra o console do navegador (F12) e execute:

```javascript
console.log('Base URL:', getBaseUrl());
console.log('URL Completa:', getBaseUrl() + 'carrinho/adicionar/1');
console.log('Pathname:', window.location.pathname);
console.log('Origin:', window.location.origin);
```

### 2. Possíveis Cenários

#### ✅ Se a URL retorna `/Lumini-main/`
- Está correto!
- A aplicação está em uma subpasta

#### ❌ Se retorna `http://localhost/`
- Verifique se a aplicação está realmente em `/Lumini-main/`
- Acesse `http://localhost/Lumini-main/` em vez de `http://localhost/`

#### ❌ Se retorna `undefined`
- A função `getBaseUrl()` não conseguiu detectar
- Você pode forçar adicionando em cada view:

```html
<script>
    const APP_BASE_URL = '<?= base_url() ?>';
    console.log('Base URL da Aplicação:', APP_BASE_URL);
</script>
```

### 3. Verificar Rotas

No servidor, execute:
```bash
php spark routes
```

Procure por linhas como:
```
POST    /carrinho/adicionar/...
GET     /carrinho/visualizar
DELETE  /carrinho/remover/...
```

### 4. Verificar Arquivo de Rotas

Abra `app/Config/Routes.php` e confirme:

```php
$routes->post('/carrinho/adicionar/(:num)', 'CarrinhoController::adicionar/$1');
$routes->get('/carrinho/visualizar', 'CarrinhoController::visualizar');
$routes->delete('/carrinho/remover/(:num)', 'CarrinhoController::remover/$1');
$routes->patch('/carrinho/atualizar/(:num)', 'CarrinhoController::atualizar/$1');
$routes->delete('/carrinho/limpar', 'CarrinhoController::limpar');
```

### 5. Teste Manual

No console, execute:
```javascript
// Testar adição ao carrinho
fetch(getBaseUrl() + 'carrinho/adicionar/1', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json'
    }
})
.then(r => {
    console.log('Status:', r.status);
    return r.json();
})
.then(d => console.log('Resposta:', d))
.catch(e => console.error('Erro:', e));
```

Verifique no console qual é a URL exata que está sendo requisitada.

### 6. Solução Rápida

Se nada funcionar, você pode adicionar em cada página (antes de `carrinho.js`):

```html
<script>
    // Força o base URL correto
    function getBaseUrl() {
        return '<?= base_url() ?>';
    }
</script>
<script src="<?= base_url('assets/js/carrinho.js') ?>"></script>
```

---

## Requisições da Network Tab (DevTools)

1. Abra F12 → Abas "Network"
2. Filtrar por "carrinho"
3. Clique em "Adicionar ao Carrinho"
4. Procure pelo request POST
5. Verifique:
   - **URL**: Deve ser algo como `http://localhost/Lumini-main/carrinho/adicionar/1`
   - **Status**: Deve ser 200 (sucesso) ou error (se falhar)
   - **Response**: Deve ser JSON com dados do produto

Se der 404, a URL está errada. Se der 405 (Method Not Allowed), a rota POST não existe.

---

## Checklist de Debug

- [ ] Rota POST `/carrinho/adicionar/:id` existe em `Routes.php`
- [ ] Controller `CarrinhoController::adicionar()` existe
- [ ] `getBaseUrl()` retorna URL correta (com `/Lumini-main/`)
- [ ] Arquivo `carrinho.js` está sendo carregado (verificar Network)
- [ ] Sem erros no console do navegador
- [ ] Migrations foram executadas (`php spark migrate`)
- [ ] Banco de dados tem tabela `carrinhos`

