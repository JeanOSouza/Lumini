<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lumini - Moda e Estilo</title>
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        /* Estilos básicos para o modal (caso não estejam no style.css) */
        .auth-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            align-items: center;
            justify-content: center;
            z-index: 1000;
        }
        
        .auth-modal.active {
            display: flex;
        }
        
        .auth-modal__overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }
        
        .auth-modal__content {
            position: relative;
            background: white;
            padding: 2rem;
            border-radius: 8px;
            width: 90%;
            max-width: 450px;
            z-index: 1001;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>

        <div class="container header-container">
            <div class="logo">Lumini</div>
            <nav>
                <ul>
                    <li><a href="">Início</a></li>
                    <li><a href="feminino">Feminino</a></li>
                    <li><a href="masculino">Masculino</a></li>
                    <li><a href="infantil">Infantil</a></li>
                    <li><a href="acessorios">Acessórios</a></li>
                    <li><a href="ofertas">Ofertas</a></li>
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
    <section class="hero">
        <div class="container hero-content">
            <h1>Descubra seu estilo único</h1>
            <p>Coleção outono/inverno 2025 com até 30% de desconto</p>
            <a href="#" class="btn">Comprar Agora</a>
        </div>
    </section>

    <!-- Categories -->
    <section class="container">
        <h2 class="section-title">Categorias</h2>
        <div class="categories">
            <a href="feminina.php">
            <div class="category-card">
                <img src="https://images.unsplash.com/photo-1525299374597-911581e1bdef?ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80" alt="Feminino">
                <div class="category-content">
                    <h3>Feminino</h3>
                </div>
            </div>
            <a href="masculino.php">
            <div class="category-card">
                <img src="https://images.unsplash.com/photo-1617137968427-85924c800a22?ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80" alt="Masculino">
                <div class="category-content">
                    <h3>Masculino</h3>
                </div>
            </div>
            <a href="infantil.php">
            <div class="category-card">
                <img src="https://images.unsplash.com/photo-1519238263530-99bdd11df2ea?ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80" alt="Infantil">
                <div class="category-content">
                    <h3>Infantil</h3>
                </div>
            </div>
            <a href="acessorios.php">
            <div class="category-card">
                <img src="https://images.unsplash.com/photo-1584917865442-de89df76afd3?ixlib=rb-1.2.1&auto=format&fit=crop&w=633&q=80" alt="Acessórios">
                <div class="category-content">
                    <h3>Acessórios</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Products -->
    <section class="container">
        <h2 class="section-title">Destaques</h2>
        <div class="products">
            <div class="product-card">
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1594633312681-425c7b97ccd1?ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80" alt="Vestido Floral">
                </div>
                <div class="product-info">
                    <h3 class="product-title">Vestido Floral</h3>
                    <p class="product-price">R$ 149,90</p>
                    <div class="product-actions">
                        <button class="btn" onclick="adicionarAoCarrinho(1)">Adicionar ao Carrinho</button>
                    </div>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1586790170083-2f9ceadc732d?ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80" alt="Blazer Masculino">
                </div>
                <div class="product-info">
                    <h3 class="product-title">Blazer Masculino</h3>
                    <p class="product-price">R$ 299,90</p>
                    <div class="product-actions">
                        <button class="btn" onclick="adicionarAoCarrinho(7)">Adicionar ao Carrinho</button>
                    </div>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1591047139829-d91aecb6caea?ixlib=rb-1.2.1&auto=format&fit=crop&w=636&q=80" alt="Jaqueta Jeans">
                </div>
                <div class="product-info">
                    <h3 class="product-title">Jaqueta Jeans</h3>
                    <p class="product-price">R$ 199,90</p>
                    <div class="product-actions">
                        <button class="btn" onclick="adicionarAoCarrinho(6)">Adicionar ao Carrinho</button>
                    </div>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1576566588028-4147f3842f27?ixlib=rb-1.2.1&auto=format&fit=crop&w=700&q=80" alt="Conjunto Infantil">
                </div>
                <div class="product-info">
                    <h3 class="product-title">Conjunto Infantil</h3>
                    <p class="product-price">R$ 119,90</p>
                    <div class="product-actions">
                        <button class="btn" onclick="adicionarAoCarrinho(9)">Adicionar ao Carrinho</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="newsletter">
        <div class="container">
            <h2>Fique por dentro das novidades</h2>
            <p>Cadastre-se para receber em primeira mão nossas promoções e lançamentos</p>
            <form class="newsletter-form">
                <input type="email" placeholder="Seu melhor e-mail">
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

<!-- Modal de Login e Cadastro -->
<div id="authModal" class="auth-modal">
    <div class="auth-modal__overlay" onclick="fecharAuthModal()"></div>
    
    <div class="auth-modal__content">
        <!-- Botão fechar -->
        <button class="auth-modal__close" onclick="fecharAuthModal()">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M18 6L6 18M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </button>

        <!-- Abas de Login/Cadastro -->
        <div class="auth-modal__tabs">
            <button class="auth-tab auth-tab--active" data-tab="login">
                <span class="auth-tab__icon">→</span>
                Entrar
            </button>
            <button class="auth-tab" data-tab="register">
                <span class="auth-tab__icon">+</span>
                Criar Conta
            </button>
        </div>

        <!-- Conteúdo das abas -->
        <div class="auth-modal__body">
            <!-- Formulário de Login -->
            <div class="auth-form auth-form--active" data-form="login">
                <div class="auth-form__header">
                    <h3>Bem-vindo de volta!</h3>
                    <p>Entre na sua conta Lumini</p>
                </div>

                <?php if (session()->has('error')): ?>
                <div class="auth-alert auth-alert--error">
                    <span>⚠</span>
                    <div><?= session('error') ?></div>
                </div>
                <?php endif; ?>

                <form class="auth-form__content" action="<?= base_url('login') ?>" method="POST">
                    <div class="form-group">
                        <div class="input-wrapper">
                            <span class="input-icon">✉</span>
                            <input type="email" name="email" placeholder="Seu e-mail" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-wrapper">
                            <span class="input-icon">🔒</span>
                            <input type="password" name="senha" placeholder="Sua senha" required>
                        </div>
                    </div>

                    <button type="submit" class="auth-btn auth-btn--primary">
                        <span class="btn-icon">→</span>
                        Entrar na Minha Conta
                    </button>
                </form>

                <div class="auth-form__footer">
                    <p>Não tem uma conta? <a href="#" onclick="mudarAba('register')">Cadastre-se aqui</a></p>
                </div>
            </div>

            <!-- Formulário de Cadastro -->
            <div class="auth-form" data-form="register">
                <div class="auth-form__header">
                    <h3>Junte-se à Lumini!</h3>
                    <p>Crie sua conta em poucos segundos</p>
                </div>

                <?php if (session()->has('errors')): ?>
                <div class="auth-alert auth-alert--error">
                    <span>⚠</span>
                    <div>
                        <?php foreach (session('errors') as $error): ?>
                        <p><?= $error ?></p>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>

                <form class="auth-form__content" action="<?= base_url('registro') ?>" method="POST">
                    <div class="form-group">
                        <div class="input-wrapper">
                            <span class="input-icon">👤</span>
                            <input type="text" name="nome" placeholder="Nome completo" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-wrapper">
                            <span class="input-icon">✉</span>
                            <input type="email" name="email" placeholder="Seu melhor e-mail" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <div class="input-wrapper">
                                <span class="input-icon">🔒</span>
                                <input type="password" name="senha" placeholder="Crie uma senha" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-wrapper">
                                <span class="input-icon">🔒</span>
                                <input type="password" name="confirmar_senha" placeholder="Confirme a senha" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-wrapper">
                            <span class="input-icon">📞</span>
                            <input type="tel" name="telefone" placeholder="Telefone (opcional)">
                        </div>
                    </div>

                    <button type="submit" class="auth-btn auth-btn--primary">
                        <span class="btn-icon">✨</span>
                        Criar Minha Conta
                    </button>
                </form>

                <div class="auth-form__footer">
                    <p>Já tem uma conta? <a href="#" onclick="mudarAba('login')">Faça login aqui</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

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