<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lumini - Acessórios</title>
    <link href="<?= base_url('/assets/css/style.css') ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

<!-- Header -->
<header>
    <div class="container header-container">
        <div class="logo">Lumini</div>
        <nav>
            <ul>
                <li><a href="<?= base_url('/') ?>">Início</a></li>
                <li><a href="<?= base_url('feminino') ?>">Feminino</a></li>
                <li><a href="<?= base_url('masculino') ?>">Masculino</a></li>
                <li><a href="<?= base_url('infantil') ?>">Infantil</a></li>
                <li><a href="<?= base_url('acessorios') ?>" class="active">Acessórios</a></li>
                <li><a href="<?= base_url('ofertas') ?>">Ofertas</a></li>
            </ul>
        </nav>
        <div class="header-icons">
            <button><div class="search-icon">🔍</div></button>
            <button class="btn-login" onclick="abrirAuthModal()"><div class="user-icon">👤</div></button>
            <a href="<?= base_url('/carrinho') ?>" style="cursor: pointer; background: none; border: none;">
                <div class="cart-icon" data-count="0">🛒</div>
            </a>
        </div>
    </div>
</header>

<!-- Hero Section -->
<section class="hero hero-small">
    <div class="container hero-content">
        <h1>Estilo em Cada Detalhe</h1>
        <p>Explore nossa coleção de acessórios que completam qualquer look ✨</p>
    </div>
</section>

<!-- Produtos de Acessórios -->
<section class="container">
    <h2 class="section-title">Acessórios em Destaque</h2>
    <div class="products">
        <div class="product-card">
            <div class="product-image">
                <img src="https://images.unsplash.com/photo-1584917865442-de89df76afd3?auto=format&fit=crop&w=700&q=80" alt="Bolsa de Couro">
            </div>
            <div class="product-info">
                <h3 class="product-title">Bolsa de Couro</h3>
                <p class="product-price">R$ 249,90</p>
                <div class="product-actions">
                    <button class="btn" onclick="adicionarAoCarrinho(13)">Adicionar ao Carrinho</button>
                </div>
            </div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="https://images.unsplash.com/photo-1612197527762-7357ad1e0a9d?auto=format&fit=crop&w=700&q=80" alt="Óculos de Sol">
            </div>
            <div class="product-info">
                <h3 class="product-title">Óculos de Sol</h3>
                <p class="product-price">R$ 189,90</p>
                <div class="product-actions">
                    <button class="btn" onclick="adicionarAoCarrinho(14)">Adicionar ao Carrinho</button>
                </div>
            </div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="https://images.unsplash.com/photo-1587831990711-23ca6441447b?auto=format&fit=crop&w=700&q=80" alt="Relógio Clássico">
            </div>
            <div class="product-info">
                <h3 class="product-title">Relógio Clássico</h3>
                <p class="product-price">R$ 399,90</p>
                <div class="product-actions">
                    <button class="btn" onclick="adicionarAoCarrinho(15)">Adicionar ao Carrinho</button>
                </div>
            </div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="https://images.unsplash.com/photo-1592810633876-9b1a4a3c9f55?auto=format&fit=crop&w=700&q=80" alt="Colar Minimalista">
            </div>
            <div class="product-info">
                <h3 class="product-title">Colar Minimalista</h3>
                <p class="product-price">R$ 99,90</p>
                <div class="product-actions">
                    <button class="btn" onclick="adicionarAoCarrinho(16)">Adicionar ao Carrinho</button>
                </div>
            </div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="https://images.unsplash.com/photo-1595433707802-6b2626efc0f0?auto=format&fit=crop&w=700&q=80" alt="Chapéu Panama">
            </div>
            <div class="product-info">
                <h3 class="product-title">Chapéu Panamá</h3>
                <p class="product-price">R$ 129,90</p>
                <div class="product-actions">
                    <button class="btn" onclick="adicionarAoCarrinho(17)">Adicionar ao Carrinho</button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Newsletter -->
<section class="newsletter">
    <div class="container">
        <h2>Fique por dentro das novidades</h2>
        <p>Assine nossa newsletter e receba promoções exclusivas</p>
        <form class="newsletter-form">
            <input type="email" placeholder="Seu melhor e-mail" required>
            <button type="submit">Assinar</button>
        </form>
    </div>
</section>

<!-- Footer -->
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
                <h3>Ajuda</h3>
                <ul>
                    <li><a href="#">Como comprar</a></li>
                    <li><a href="#">Prazos de entrega</a></li>
                    <li><a href="#">Política de trocas</a></li>
                    <li><a href="#">Formas de pagamento</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Contato</h3>
                <ul>
                    <li>📞 (31) 0000-0000</li>
                    <li>✉ contato@lumini.com.br</li>
                    <li>🏠 Av. Castelo Branco, 1000 - Viçosa/MG</li>
                </ul>
                <div class="social-icons">
                    <a href="#">📱</a>
                    <a href="#">💬</a>
                    <a href="#">📸</a>
                    <a href="#">🔴</a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 Lumini - Todos os direitos reservados</p>
        </div>
    </div>
</footer>

<!-- Modal de Login e Cadastro (mesmo do index) -->

<script src="<?= base_url('/assets/js/modal.js') ?>"></script>
<script src="<?= base_url('/assets/js/carrinho.js') ?>"></script>

<script>
// Variável global para controlar o modal
let authModalAberta = false;

// Função para abrir o modal
function abrirAuthModal() {
    console.log('Abrindo modal de login...');
    const modal = document.getElementById('authModal');
    if (modal) {
        modal.style.display = 'flex';
        modal.classList.add('active');
        document.body.style.overflow = 'hidden'; // Trava o scroll
        authModalAberta = true; // Atualiza o estado do modal
    }
}

// Função para fechar o modal
function fecharAuthModal() {
    const modal = document.getElementById('authModal');
    if (modal) {
        modal.style.display = 'none';
        modal.classList.remove('active');
        document.body.style.overflow = ''; // Libera o scroll
        authModalAberta = false; // Atualiza o estado do modal
    }
}

// Função para mudar entre abas
function mudarAba(aba) {
    // Ativa a aba clicada
    document.querySelectorAll('.auth-tab').forEach(tab => {
        tab.classList.toggle('auth-tab--active', tab.dataset.tab === aba);
    });

    // Mostra o formulário correspondente
    document.querySelectorAll('.auth-form').forEach(form => {
        form.classList.toggle('auth-form--active', form.dataset.form === aba);
    });
}

// Fechar modal com ESC
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' && authModalAberta) {
        fecharAuthModal();
    }
});

// Event listeners para as abas
document.querySelectorAll('.auth-tab').forEach(tab => {
    tab.addEventListener('click', function() {
        mudarAba(this.dataset.tab);
    });
});

// Fechar modal ao clicar fora do conteúdo
document.querySelector('.auth-modal__overlay').addEventListener('click', fecharAuthModal);

// Inicialização quando o DOM estiver carregado
document.addEventListener('DOMContentLoaded', function() {
    console.log('Sistema de autenticação carregado!');
    
    // Verifica se há erros para mostrar automaticamente a aba correta
    <?php if (session()->has('errors')): ?>
        mudarAba('register');
        abrirAuthModal(); // Abre o modal se houver erros
    <?php endif; ?>
    
    <?php if (session()->has('error')): ?>
        abrirAuthModal(); // Abre o modal se houver erro de login
    <?php endif; ?>
});
</script>
</body>
</html>