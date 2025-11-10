<?php

namespace App\Controllers;

use App\Models\ProdutoModel;
use App\Models\PedidoModel;
use App\Models\PedidoItemModel;
use CodeIgniter\API\ResponseTrait;

class CompraController extends BaseController
{
    use ResponseTrait;

    public function finalizar($produto_id)
    {
        // ⚙️ Simulação de usuário logado (fixo)
        $usuario_id = 1;

        $produtoModel = new ProdutoModel();
        $pedidoModel = new PedidoModel();
        $pedidoItemModel = new PedidoItemModel();

        // 🔍 Verifica se o produto existe
        $produto = $produtoModel->find($produto_id);
        if (!$produto) {
            return $this->failNotFound('Produto não encontrado.');
        }

        // 🧮 Verifica estoque
        if ($produto['estoque'] <= 0) {
            return $this->fail('Produto sem estoque disponível.');
        }

        // 🧾 Cria o pedido
        $pedido_id = $pedidoModel->insert([
            'usuario_id' => $usuario_id,
            'total' => $produto['preco'],
            'status' => 'confirmado',
            'confirmado_em' => date('Y-m-d H:i:s')
        ]);

        // 🛍️ Adiciona o item do pedido
        $pedidoItemModel->insert([
            'pedido_id'  => $pedido_id,
            'produto_id' => $produto_id,
            'quantidade' => 1,
            'preco_unit' => $produto['preco'],
            'subtotal'   => $produto['preco']
        ]);

        // 🔄 Atualiza estoque
        $produtoModel->update($produto_id, [
            'estoque' => $produto['estoque'] - 1
        ]);

        // ✅ Retorna resposta
        return $this->respond([
            'mensagem' => 'Compra finalizada com sucesso!',
            'pedido_id' => $pedido_id,
            'produto' => $produto['nome'],
            'valor' => $produto['preco']
        ]);
    }
}
