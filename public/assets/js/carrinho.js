// Funções para integração do carrinho

// Detecta a URL base da aplicação
function getBaseUrl() {
    // Estratégia 1: Verificar se existe elemento com data-base-url
    const baseElement = document.querySelector('[data-base-url]');
    if (baseElement) {
        let baseUrl = baseElement.getAttribute('data-base-url');
        if (!baseUrl.endsWith('/')) baseUrl += '/';
        return baseUrl;
    }
    
    // Estratégia 2: Verificar tag <base>
    const baseTags = document.getElementsByTagName('base');
    if (baseTags.length > 0 && baseTags[0].href) {
        return baseTags[0].href;
    }
    
    // Estratégia 3: Construir a partir do pathname
    // A aplicação está em /Lumini-main/public/, então a base_url é /Lumini-main/public/
    const currentUrl = window.location.pathname;
    
    // Se o URL contém /Lumini-main/public/, extrair a base
    if (currentUrl.includes('/Lumini-main/public')) {
        // Retornar até /public/
        const match = currentUrl.match(/(.+\/public\/)/);
        if (match) {
            return match[1];
        }
    }
    
    // Fallback: usar a raiz do domínio
    const protocol = window.location.protocol;
    const hostname = window.location.hostname;
    const port = window.location.port ? ':' + window.location.port : '';
    
    return protocol + '//' + hostname + port + '/Lumini-main/public/';
}

// Log para debug
console.log('🔧 Base URL do Carrinho:', getBaseUrl());

async function adicionarAoCarrinho(produtoId) {
    try {
        const base = getBaseUrl();
        const url = base + 'carrinho/adicionar/' + produtoId;
        
        console.log('📤 POST:', url);
        
        const response = await fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        });

        console.log('📊 Status:', response.status);
        
        const data = await response.json();
        console.log('📥 Resposta:', data);

        if (response.ok) {
            mostrarNotificacao(`${data.produto_nome} adicionado ao carrinho!`, 'sucesso');
            atualizarContadorCarrinho();
        } else {
            mostrarNotificacao(data.messages || 'Erro ao adicionar ao carrinho', 'erro');
        }
    } catch (error) {
        console.error('❌ Erro:', error);
        mostrarNotificacao('Erro ao adicionar ao carrinho. Verifique o console (F12).', 'erro');
    }
}

async function atualizarContadorCarrinho() {
    try {
        const base = getBaseUrl();
        const url = base + 'carrinho/visualizar';
        
        const response = await fetch(url, {
            method: 'GET',
            headers: {
                'Accept': 'application/json'
            }
        });

        const data = await response.json();
        
        if (data.quantidade_itens > 0) {
            const cartIcon = document.querySelector('.cart-icon');
            if (cartIcon) {
                cartIcon.setAttribute('data-count', data.quantidade_itens);
            }
        }
    } catch (error) {
        console.error('Erro ao atualizar contador:', error);
    }
}

function mostrarNotificacao(mensagem, tipo = 'info') {
    // Remove notificação anterior se existir
    const notificacaoAnterior = document.querySelector('.notificacao');
    if (notificacaoAnterior) {
        notificacaoAnterior.remove();
    }

    const notificacao = document.createElement('div');
    notificacao.className = `notificacao notificacao-${tipo}`;
    notificacao.textContent = mensagem;

    const style = document.createElement('style');
    style.textContent = `
        .notificacao {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 15px 20px;
            border-radius: 4px;
            font-size: 14px;
            z-index: 10000;
            animation: slideIn 0.3s ease-out;
        }

        .notificacao-sucesso {
            background-color: #4CAF50;
            color: white;
        }

        .notificacao-erro {
            background-color: #ff4444;
            color: white;
        }

        .notificacao-info {
            background-color: #2196F3;
            color: white;
        }

        @keyframes slideIn {
            from {
                transform: translateX(400px);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
    `;

    document.head.appendChild(style);
    document.body.appendChild(notificacao);

    // Remove notificação após 3 segundos
    setTimeout(() => {
        notificacao.style.animation = 'slideOut 0.3s ease-in forwards';
        setTimeout(() => notificacao.remove(), 300);
    }, 3000);
}

// Abre o modal de autenticação (placeholder)
function abrirAuthModal() {
    alert('Função de autenticação não implementada ainda');
}

// Atualiza o contador do carrinho ao carregar a página
document.addEventListener('DOMContentLoaded', atualizarContadorCarrinho);
