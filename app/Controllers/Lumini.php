<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class Lumini extends Controller
{
    public function index()
    {
        // Dados básicos para a view
        $data = [
            'titulo' => 'Lumini - Sua Loja de Roupas',
            'mensagem' => 'Bem-vindo à Lumini!'
        ];
        
        // Carrega a view da página inicial
        return view('pagina_inicial', $data);
    }
public function feminino()
{
    return view('feminino');
}

public function masculino()
{
    return view('masculino');
}

public function infantil()
{
    return view('infantil');
}

public function ofertas()
{
    return view('ofertas');
}

public function acessorios()
{
    return view('acessorios');
}

public function carrinho()
{
    return view('carrinho');
}

}