<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CriarEcommerceCompleto extends Migration
{
    public function up()
    {
        /**
         * Usuários
         */
        $this->forge->addField([
            'id'    => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'nome'  => ['type' => 'VARCHAR', 'constraint' => 100],
            'email' => ['type' => 'VARCHAR', 'constraint' => 100, 'unique' => true],
            'senha' => ['type' => 'VARCHAR', 'constraint' => 255],
            
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('usuarios');

        /**
         * Categorias (ex: Feminino, Masculino, Infantil, etc.)
         */
        $this->forge->addField([
            'id'   => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'nome' => ['type' => 'VARCHAR', 'constraint' => 100],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('categorias');

        /**
         * Produtos
         */
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'categoria_id'=> ['type' => 'INT', 'unsigned' => true, 'null' => true],
            'nome'        => ['type' => 'VARCHAR', 'constraint' => 100],
            'descricao'   => ['type' => 'TEXT', 'null' => true],
            'preco'       => ['type' => 'DECIMAL', 'constraint' => '10,2'],
            'estoque'     => ['type' => 'INT', 'default' => 0],
            'imagem'      => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('categoria_id', 'categorias', 'id', 'SET NULL', 'CASCADE');
        $this->forge->createTable('produtos');

        /**
         * Endereços (para entrega)
         */
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'usuario_id' => ['type' => 'INT', 'unsigned' => true],
            'rua'        => ['type' => 'VARCHAR', 'constraint' => 255],
            'numero'     => ['type' => 'VARCHAR', 'constraint' => 20],
            'bairro'     => ['type' => 'VARCHAR', 'constraint' => 100],
            'cidade'     => ['type' => 'VARCHAR', 'constraint' => 100],
            'estado'     => ['type' => 'VARCHAR', 'constraint' => 50],
            'cep'        => ['type' => 'VARCHAR', 'constraint' => 20],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('usuario_id', 'usuarios', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('enderecos');

        /**
         * Carrinhos
         */
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'usuario_id' => ['type' => 'INT', 'unsigned' => true],
            'ativo'      => ['type' => 'BOOLEAN', 'default' => true],
            'criado_em'  => ['type' => 'TIMESTAMP', 'default' => 'CURRENT_TIMESTAMP'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('usuario_id', 'usuarios', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('carrinhos');

        /**
         * Itens do Carrinho
         */
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'carrinho_id' => ['type' => 'INT', 'unsigned' => true],
            'produto_id'  => ['type' => 'INT', 'unsigned' => true],
            'quantidade'  => ['type' => 'INT', 'default' => 1],
            'subtotal'    => ['type' => 'DECIMAL', 'constraint' => '10,2'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('carrinho_id', 'carrinhos', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('produto_id', 'produtos', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('carrinho_itens');

        /**
         * Pedidos
         */
        $this->forge->addField([
            'id'            => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'usuario_id'    => ['type' => 'INT', 'unsigned' => true],
            'endereco_id'   => ['type' => 'INT', 'unsigned' => true, 'null' => true],
            'total'         => ['type' => 'DECIMAL', 'constraint' => '10,2'],
            'status'        => ['type' => 'VARCHAR', 'constraint' => 50, 'default' => 'pendente'],
            'criado_em'     => ['type' => 'TIMESTAMP', 'default' => 'CURRENT_TIMESTAMP'],
            'confirmado_em' => ['type' => 'TIMESTAMP', 'null' => true],
        ]);
        
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('usuario_id', 'usuarios', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('endereco_id', 'enderecos', 'id', 'SET NULL', 'CASCADE');
        $this->forge->createTable('pedidos');

        /**
         * Itens do Pedido
         */
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'pedido_id'  => ['type' => 'INT', 'unsigned' => true],
            'produto_id' => ['type' => 'INT', 'unsigned' => true],
            'quantidade' => ['type' => 'INT', 'default' => 1],
            'preco_unit' => ['type' => 'DECIMAL', 'constraint' => '10,2'],
            'subtotal'   => ['type' => 'DECIMAL', 'constraint' => '10,2'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('pedido_id', 'pedidos', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('produto_id', 'produtos', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('pedido_itens');
    }

    public function down()
    {
        $this->forge->dropTable('pedido_itens', true);
        $this->forge->dropTable('pedidos', true);
        $this->forge->dropTable('carrinho_itens', true);
        $this->forge->dropTable('carrinhos', true);
        $this->forge->dropTable('enderecos', true);
        $this->forge->dropTable('produtos', true);
        $this->forge->dropTable('categorias', true);
        $this->forge->dropTable('usuarios', true);
    }
}
