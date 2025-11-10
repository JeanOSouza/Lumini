<?php

namespace App\Models;

use CodeIgniter\Model;

class CarrinhoItemModel extends Model
{
    protected $table = 'carrinho_itens';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'carrinho_id', 'produto_id', 'quantidade', 'subtotal'
    ];

    /**
     * Obtém todos os itens do carrinho com informações do produto
     */
    public function getItensPorCarrinho($carrinho_id)
    {
        return $this->select('carrinho_itens.*, produtos.nome, produtos.preco, produtos.imagem')
                    ->join('produtos', 'produtos.id = carrinho_itens.produto_id')
                    ->where('carrinho_itens.carrinho_id', $carrinho_id)
                    ->findAll();
    }

    /**
     * Adiciona um produto ao carrinho ou aumenta a quantidade
     */
    public function adicionarAoCarrinho($carrinho_id, $produto_id, $quantidade = 1, $subtotal = 0)
    {
        // Verifica se o produto já existe no carrinho
        $itemExistente = $this->where('carrinho_id', $carrinho_id)
                              ->where('produto_id', $produto_id)
                              ->first();

        if ($itemExistente) {
            // Atualiza a quantidade
            $novaQuantidade = $itemExistente['quantidade'] + $quantidade;
            $novoSubtotal = $itemExistente['subtotal'] + $subtotal;
            
            return $this->update($itemExistente['id'], [
                'quantidade' => $novaQuantidade,
                'subtotal'   => $novoSubtotal
            ]);
        } else {
            // Insere novo item
            return $this->insert([
                'carrinho_id' => $carrinho_id,
                'produto_id'  => $produto_id,
                'quantidade'  => $quantidade,
                'subtotal'    => $subtotal
            ]);
        }
    }

    /**
     * Remove um item do carrinho
     */
    public function removerDoCarrinho($carrinho_id, $produto_id)
    {
        return $this->where('carrinho_id', $carrinho_id)
                    ->where('produto_id', $produto_id)
                    ->delete();
    }

    /**
     * Atualiza a quantidade de um item
     */
    public function atualizarQuantidade($carrinho_id, $produto_id, $quantidade)
    {
        $item = $this->where('carrinho_id', $carrinho_id)
                     ->where('produto_id', $produto_id)
                     ->first();

        if ($item) {
            // Obtém o preço unitário
            $produtoModel = new ProdutoModel();
            $produto = $produtoModel->find($produto_id);
            
            if ($produto) {
                $novoSubtotal = $produto['preco'] * $quantidade;
                
                return $this->update($item['id'], [
                    'quantidade' => $quantidade,
                    'subtotal'   => $novoSubtotal
                ]);
            }
        }

        return false;
    }

    /**
     * Limpa todos os itens do carrinho
     */
    public function limparCarrinho($carrinho_id)
    {
        return $this->where('carrinho_id', $carrinho_id)->delete();
    }
}
