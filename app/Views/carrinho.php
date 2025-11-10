<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho - Lumini</title>
    <link href="<?= base_url('/assets/css/style.css') ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        .cart-container {
            max-width: 900px;
            margin: 40px auto;
            padding: 20px;
        }

        .cart-empty {
            text-align: center;
            padding: 40px;
            color: #999;
        }

        .cart-items {
            background: #f9f9f9;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .cart-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
            border-bottom: 1px solid #eee;
        }

        .cart-item:last-child {
            border-bottom: none;
        }

        .item-info {
            display: flex;
            align-items: center;
            flex: 1;
        }

        .item-image {
            width: 80px;
            height: 80px;
            object-fit: cover;
            margin-right: 20px;
            border-radius: 4px;
        }

        .item-details h3 {
            margin: 0 0 5px 0;
            font-size: 16px;
        }

        .item-details p {
            margin: 0;
            color: #666;
            font-size: 14px;
        }

        .item-controls {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-right: 20px;
        }

        .quantity-control {
            display: flex;
            align-items: center;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .quantity-control button {
            background: none;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            font-size: 16px;
        }

        .quantity-control input {
            width: 40px;
            border: none;
            text-align: center;
            font-size: 14px;
        }

        .item-price {
            min-width: 80px;
            text-align: right;
            font-weight: 600;
            font-size: 16px;
        }

        .remove-btn {
            background: #ff4444;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        .remove-btn:hover {
            background: #cc0000;
        }

        .cart-summary {
            background: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            font-size: 16px;
        }

        .summary-row.total {
            border-top: 2px solid #ddd;
            padding-top: 15px;
            font-size: 20px;
            font-weight: 700;
            color: #333;
        }

        .cart-actions {
            display: flex;
            gap: 10px;
        }

        .btn-checkout {
            flex: 1;
            padding: 15px;
            background: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
        }

        .btn-checkout:hover {
            background: #45a049;
        }

        .btn-continue-shopping {
            flex: 1;
            padding: 15px;
            background: #f0f0f0;
            color: #333;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-continue-shopping:hover {
            background: #e0e0e0;
        }

        .btn-clear-cart {
            padding: 10px 15px;
            background: #ff9999;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-clear-cart:hover {
            background: #ff6666;
        }

        .loading {
            text-align: center;
            padding: 40px;
            font-size: 18px;
            color: #666;
        }
    </style>
</head>
<body>

<header>
    <div class="container header-container">
        <div class="logo">Lumini</div>
        <nav>
            <ul>
                <li><a href="<?= base_url('/') ?>">Início</a></li>
                <li><a href="<?= base_url('feminino') ?>">Feminino</a></li>
                <li><a href="<?= base_url('masculino') ?>">Masculino</a></li>
                <li><a href="<?= base_url('infantil') ?>">Infantil</a></li>
                <li><a href="<?= base_url('acessorios') ?>">Acessórios</a></li>
                <li><a href="<?= base_url('ofertas') ?>">Ofertas</a></li>
            </ul>
        </nav>
        <div class="header-icons">
            <button><div class="search-icon">🔍</div></button>
            <button class="btn-login" onclick="abrirAuthModal()"><div class="user-icon">👤</div></button>
            <button><div class="cart-icon">🛒</div></button>
        </div>
    </div>
</header>

<div class="cart-container">
    <h1>Seu Carrinho</h1>

    <div id="loading" class="loading" style="display: none;">Carregando carrinho...</div>

    <div id="cartContent">
        <!-- O conteúdo será carregado via JavaScript -->
    </div>
</div>

<footer>
    <div class="container">
        <div class="footer-content">
            <div class="footer-column">
                <h3>Lumini</h3>
                <p>Sua loja de moda e estilo para toda a família. Oferecemos as últimas tendências com qualidade e preço justo.</p>
            </div>
            <div class="footer-column">
                <h3>Institucional</h3>
                <ul>
                    <li><a href="#">Sobre nós</a></li>
                    <li><a href="#">Nossas lojas</a></li>
                    <li><a href="#">Trabalhe conosco</a></li>
                    <li><a href="#">Termos e condições</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Suporte</h3>
                <ul>
                    <li><a href="#">Fale conosco</a></li>
                    <li><a href="#">Trocas e devoluções</a></li>
                    <li><a href="#">Promoções</a></li>
                    <li><a href="#">Newsletter</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<script>
    // Detecta a URL base da aplicação
    function getBaseUrl() {
        // Tenta obter do atributo data-base-url (recomendado)
        const baseElement = document.querySelector('[data-base-url]');
        if (baseElement) {
            return baseElement.getAttribute('data-base-url');
        }
        
        // Tenta obter da tag base do HTML
        const baseTags = document.getElementsByTagName('base');
        if (baseTags.length > 0) {
            return baseTags[0].href;
        }
        
        // Fallback: usar raiz do domínio + /Lumini-main/
        const href = window.location.href;
        const baseUrl = href.substring(0, href.lastIndexOf('/') + 1);
        
        // Se a URL contém /Lumini-main/, use isso como base
        if (baseUrl.includes('/Lumini-main/')) {
            return baseUrl.substring(0, baseUrl.indexOf('/Lumini-main/')) + '/Lumini-main/';
        }
        
        return baseUrl;
    }

    async function carregarCarrinho() {
        document.getElementById('loading').style.display = 'block';
        document.getElementById('cartContent').innerHTML = '';

        try {
            const base = getBaseUrl();
            const response = await fetch(base + 'carrinho/visualizar', {
                method: 'GET',
                headers: {
                    'Accept': 'application/json'
                }
            });

            const data = await response.json();
            document.getElementById('loading').style.display = 'none';

            if (data.itens && data.itens.length > 0) {
                renderizarCarrinho(data);
            } else {
                document.getElementById('cartContent').innerHTML = `
                    <div class="cart-empty">
                        <h2>Seu carrinho está vazio</h2>
                        <p>Que tal adicionar alguns produtos?</p>
                        <a href="${getBaseUrl()}feminino" class="btn">Voltar às Compras</a>
                    </div>
                `;
            }
        } catch (error) {
            console.error('Erro ao carregar carrinho:', error);
            document.getElementById('loading').style.display = 'none';
            document.getElementById('cartContent').innerHTML = '<div class="cart-empty"><p>Erro ao carregar carrinho. Tente novamente.</p></div>';
        }
    }

    function renderizarCarrinho(data) {
        let html = '<div class="cart-items">';

        data.itens.forEach(item => {
            html += `
                <div class="cart-item">
                    <div class="item-info">
                        ${item.imagem ? `<img src="${item.imagem}" alt="${item.nome}" class="item-image">` : ''}
                        <div class="item-details">
                            <h3>${item.nome}</h3>
                            <p>R$ ${parseFloat(item.preco).toFixed(2).replace('.', ',')}</p>
                        </div>
                    </div>
                    <div class="item-controls">
                        <div class="quantity-control">
                            <button onclick="diminuirQuantidade(${item.produto_id})">−</button>
                            <input type="number" value="${item.quantidade}" onchange="atualizarQuantidade(${item.produto_id}, this.value)" min="1">
                            <button onclick="aumentarQuantidade(${item.produto_id})">+</button>
                        </div>
                    </div>
                    <div class="item-price">
                        R$ ${parseFloat(item.subtotal).toFixed(2).replace('.', ',')}
                    </div>
                    <button class="remove-btn" onclick="removerDoCarrinho(${item.produto_id})">Remover</button>
                </div>
            `;
        });

        html += '</div>';

        // Resumo do carrinho
        html += `
            <div class="cart-summary">
                <div class="summary-row">
                    <span>Subtotal:</span>
                    <span>R$ ${parseFloat(data.total).toFixed(2).replace('.', ',')}</span>
                </div>
                <div class="summary-row">
                    <span>Frete:</span>
                    <span>A calcular</span>
                </div>
                <div class="summary-row total">
                    <span>Total:</span>
                    <span>R$ ${parseFloat(data.total).toFixed(2).replace('.', ',')}</span>
                </div>
            </div>

            <div class="cart-actions">
                <a href="${getBaseUrl()}feminino" class="btn-continue-shopping">Continuar Comprando</a>
                <button class="btn-checkout" onclick="finalizarCompra()">Finalizar Compra</button>
            </div>

            <div style="text-align: center; margin-top: 20px;">
                <button class="btn-clear-cart" onclick="limparCarrinho()">Limpar Carrinho</button>
            </div>
        `;

        document.getElementById('cartContent').innerHTML = html;
    }

    async function removerDoCarrinho(produtoId) {
        if (!confirm('Tem certeza que deseja remover este item?')) return;

        try {
            const response = await fetch('<?= base_url('carrinho/remover') ?>/' + produtoId, {
                method: 'DELETE'
            });

            if (response.ok) {
                carregarCarrinho();
            } else {
                alert('Erro ao remover item');
            }
        } catch (error) {
            console.error('Erro:', error);
            alert('Erro ao remover item');
        }
    }

    async function atualizarQuantidade(produtoId, quantidade) {
        if (quantidade < 1) {
            removerDoCarrinho(produtoId);
            return;
        }

        try {
            const response = await fetch('<?= base_url('carrinho/atualizar') ?>/' + produtoId, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ quantidade: parseInt(quantidade) })
            });

            if (response.ok) {
                carregarCarrinho();
            } else {
                alert('Erro ao atualizar quantidade');
            }
        } catch (error) {
            console.error('Erro:', error);
            alert('Erro ao atualizar quantidade');
        }
    }

    function aumentarQuantidade(produtoId) {
        const input = event.target.parentElement.querySelector('input');
        input.value = parseInt(input.value) + 1;
        atualizarQuantidade(produtoId, input.value);
    }

    function diminuirQuantidade(produtoId) {
        const input = event.target.parentElement.querySelector('input');
        if (parseInt(input.value) > 1) {
            input.value = parseInt(input.value) - 1;
            atualizarQuantidade(produtoId, input.value);
        } else {
            removerDoCarrinho(produtoId);
        }
    }

    async function limparCarrinho() {
        if (!confirm('Tem certeza que deseja limpar todo o carrinho?')) return;

        try {
            const response = await fetch('<?= base_url('carrinho/limpar') ?>', {
                method: 'DELETE'
            });

            if (response.ok) {
                carregarCarrinho();
            } else {
                alert('Erro ao limpar carrinho');
            }
        } catch (error) {
            console.error('Erro:', error);
            alert('Erro ao limpar carrinho');
        }
    }

    function finalizarCompra() {
        alert('Redirecionando para checkout...');
        // TODO: Implementar checkout
        // window.location.href = '<?= base_url('/checkout') ?>';
    }

    // Carrega o carrinho ao abrir a página
    document.addEventListener('DOMContentLoaded', carregarCarrinho);
</script>

</body>
</html>
