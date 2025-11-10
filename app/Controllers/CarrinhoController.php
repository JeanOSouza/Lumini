<?php

namespace App\Controllers;

use App\Models\CarrinhoModel;
use App\Models\CarrinhoItemModel;
use App\Models\ProdutoModel;
use CodeIgniter\API\ResponseTrait;

class CarrinhoController extends BaseController
{
    use ResponseTrait;

    protected $carrinhoModel;
    protected $carrinhoItemModel;
    protected $produtoModel;

    public function __construct()
    {
        $this->carrinhoModel = new CarrinhoModel();
        $this->carrinhoItemModel = new CarrinhoItemModel();
        $this->produtoModel = new ProdutoModel();
    }

    /**
     * Obtém ou cria um carrinho para o usuário
     */
    private function getOuCriarCarrinho($usuario_id)
    {
        $carrinho = $this->carrinhoModel->getCarrinhoAtivo($usuario_id);

        if (!$carrinho) {
            $carrinho_id = $this->carrinhoModel->criarCarrinho($usuario_id);
            return $this->carrinhoModel->find($carrinho_id);
        }

        return $carrinho;
    }

    /**
     * Adiciona um produto ao carrinho
     * POST /carrinho/adicionar/{produto_id}
     */
    public function adicionar($produto_id)
    {
        // ⚙️ Simulação de usuário logado (fixo)
        $usuario_id = 1;

        // Verifica se o produto existe
        $produto = $this->produtoModel->find($produto_id);
        if (!$produto) {
            return $this->failNotFound('Produto não encontrado.');
        }

        // Verifica estoque
        if ($produto['estoque'] <= 0) {
            return $this->fail('Produto sem estoque disponível.');
        }

        // Obtém ou cria carrinho
        $carrinho = $this->getOuCriarCarrinho($usuario_id);

        // Adiciona o item ao carrinho
        $this->carrinhoItemModel->adicionarAoCarrinho(
            $carrinho['id'],
            $produto_id,
            1,
            $produto['preco']
        );

        return $this->respond([
            'mensagem' => 'Produto adicionado ao carrinho com sucesso!',
            'produto_id' => $produto_id,
            'produto_nome' => $produto['nome'],
            'preco' => $produto['preco']
        ]);
    }

    /**
     * Visualiza o carrinho
     * GET /carrinho/visualizar
     */
    public function visualizar()
    {
        // ⚙️ Simulação de usuário logado (fixo)
        $usuario_id = 1;

        // Obtém ou cria carrinho
        $carrinho = $this->getOuCriarCarrinho($usuario_id);

        // Obtém itens do carrinho
        $itens = $this->carrinhoItemModel->getItensPorCarrinho($carrinho['id']);

        // Calcula total
        $total = $this->carrinhoModel->getTotalCarrinho($carrinho['id']) ?? 0;

        return $this->respond([
            'carrinho_id' => $carrinho['id'],
            'itens' => $itens,
            'total' => $total,
            'quantidade_itens' => count($itens)
        ]);
    }

    /**
     * Remove um item do carrinho
     * DELETE /carrinho/remover/{produto_id}
     */
    public function remover($produto_id)
    {
        // ⚙️ Simulação de usuário logado (fixo)
        $usuario_id = 1;

        // Obtém carrinho do usuário
        $carrinho = $this->carrinhoModel->getCarrinhoAtivo($usuario_id);

        if (!$carrinho) {
            return $this->failNotFound('Carrinho não encontrado.');
        }

        // Remove o item
        $this->carrinhoItemModel->removerDoCarrinho($carrinho['id'], $produto_id);

        // Obtém novo total
        $itens = $this->carrinhoItemModel->getItensPorCarrinho($carrinho['id']);
        $total = $this->carrinhoModel->getTotalCarrinho($carrinho['id']) ?? 0;

        return $this->respond([
            'mensagem' => 'Produto removido do carrinho.',
            'total' => $total,
            'itens_restantes' => count($itens)
        ]);
    }

    /**
     * Atualiza a quantidade de um item
     * PATCH /carrinho/atualizar/{produto_id}
     */
    public function atualizar($produto_id)
    {
        // ⚙️ Simulação de usuário logado (fixo)
        $usuario_id = 1;
        
        $data = $this->request->getJSON();
        
        if (!isset($data->quantidade) || $data->quantidade < 1) {
            return $this->fail('Quantidade inválida.');
        }

        // Obtém carrinho do usuário
        $carrinho = $this->carrinhoModel->getCarrinhoAtivo($usuario_id);

        if (!$carrinho) {
            return $this->failNotFound('Carrinho não encontrado.');
        }

        // Atualiza quantidade
        $this->carrinhoItemModel->atualizarQuantidade(
            $carrinho['id'],
            $produto_id,
            $data->quantidade
        );

        // Obtém novo total
        $total = $this->carrinhoModel->getTotalCarrinho($carrinho['id']) ?? 0;

        return $this->respond([
            'mensagem' => 'Quantidade atualizada.',
            'produto_id' => $produto_id,
            'quantidade' => $data->quantidade,
            'total' => $total
        ]);
    }

    /**
     * Limpa o carrinho
     * DELETE /carrinho/limpar
     */
    public function limpar()
    {
        // ⚙️ Simulação de usuário logado (fixo)
        $usuario_id = 1;

        // Obtém carrinho do usuário
        $carrinho = $this->carrinhoModel->getCarrinhoAtivo($usuario_id);

        if (!$carrinho) {
            return $this->failNotFound('Carrinho não encontrado.');
        }

        // Limpa os itens
        $this->carrinhoItemModel->limparCarrinho($carrinho['id']);

        return $this->respond([
            'mensagem' => 'Carrinho esvaziado.'
        ]);
    }
}
