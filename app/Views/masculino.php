<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lumini - Moda Masculina</title>
    <link href="<?= base_url('/assets/css/style.css') ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

<header>
    <div class="container header-container">
        <div class="logo">Lumini</div>
        <nav>
            <ul>
                <li><a href="<?= base_url('/') ?>">Início</a></li>
                <li><a href="<?= base_url('feminino') ?>">Feminino</a></li>
                <li><a href="<?= base_url('masculino') ?>" class="active">Masculino</a></li>
                <li><a href="<?= base_url('infantil') ?>">Infantil</a></li>
                <li><a href="<?= base_url('acessorios') ?>">Acessórios</a></li>
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

<section class="hero hero-small">
    <div class="container hero-content">
        <h1>Moda Masculina Lumini</h1>
        <p>Estilo, conforto e atitude para o homem moderno 👔</p>
    </div>
</section>

<section class="container">
    <h2 class="section-title">Destaques Masculinos</h2>
    <div class="products">
        <div class="product-card">
            <img src="https://images.unsplash.com/photo-1593032457860-ef3b1b277ae4?auto=format&fit=crop&w=700&q=80" alt="Camisa Casual">
            <div class="product-info">
                <h3>Camisa Casual</h3>
                <p class="product-price">R$ 129,90</p>
                <button class="btn" onclick="adicionarAoCarrinho(5)">Adicionar ao Carrinho</button>
            </div>
        </div>
        <div class="product-card">
            <img src="https://images.unsplash.com/photo-1591047139829-d91aecb6caea?auto=format&fit=crop&w=700&q=80" alt="Jaqueta Jeans">
            <div class="product-info">
                <h3>Jaqueta Jeans</h3>
                <p class="product-price">R$ 199,90</p>
                <button class="btn" onclick="adicionarAoCarrinho(6)">Adicionar ao Carrinho</button>
            </div>
        </div>
        <div class="product-card">
            <img src="https://images.unsplash.com/photo-1617137968427-85924c800a22?auto=format&fit=crop&w=700&q=80" alt="Blazer Masculino">
            <div class="product-info">
                <h3>Blazer Clássico</h3>
                <p class="product-price">R$ 299,90</p>
                <button class="btn" onclick="adicionarAoCarrinho(7)">Adicionar ao Carrinho</button>
            </div>
        </div>
        <div class="product-card">
            <img src="https://images.unsplash.com/photo-1583225151521-0c7a2d40a4b5?auto=format&fit=crop&w=700&q=80" alt="Camiseta Básica">
            <div class="product-info">
                <h3>Camiseta Básica</h3>
                <p class="product-price">R$ 79,90</p>
                <button class="btn" onclick="adicionarAoCarrinho(8)">Adicionar ao Carrinho</button>
            </div>
        </div>
    </div>
</section>

<section class="newsletter">
    <div class="container">
        <h2>Assine e receba novidades da linha masculina</h2>
        <form class="newsletter-form">
            <input type="email" placeholder="Seu melhor e-mail">
            <button>Assinar</button>
        </form>
    </div>
</section>

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