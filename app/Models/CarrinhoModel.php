<?php

namespace App\Models;

use CodeIgniter\Model;

class CarrinhoModel extends Model
{
    protected $table = 'carrinhos';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'usuario_id', 'ativo', 'criado_em'
    ];

    /**
     * Obtém o carrinho ativo do usuário
     */
    public function getCarrinhoAtivo($usuario_id)
    {
        return $this->where('usuario_id', $usuario_id)
                    ->where('ativo', true)
                    ->first();
    }

    /**
     * Cria um novo carrinho para o usuário
     */
    public function criarCarrinho($usuario_id)
    {
        return $this->insert([
            'usuario_id' => $usuario_id,
            'ativo'      => true,
            'criado_em'  => date('Y-m-d H:i:s')
        ]);
    }

    /**
     * Obtém o total do carrinho
     */
    public function getTotalCarrinho($carrinho_id)
    {
        return $this->db->table('carrinho_itens')
                        ->selectSum('subtotal')
                        ->where('carrinho_id', $carrinho_id)
                        ->get()
                        ->getRow()->subtotal ?? 0;
    }
}
