<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Lumini::index');

// Rotas adicionais
$routes->get('/feminino', 'Lumini::feminino');
$routes->get('/masculino', 'Lumini::masculino');
$routes->get('/infantil', 'Lumini::infantil');
$routes->get('/ofertas', 'Lumini::ofertas');
$routes->get('/acessorios', 'Lumini::acessorios');

$routes->get('/compra/(:num)', 'CompraController::finalizar/$1');

// Rotas do Carrinho
$routes->post('/carrinho/adicionar/(:num)', 'CarrinhoController::adicionar/$1');
$routes->get('/carrinho', 'Lumini::carrinho');
$routes->get('/carrinho/visualizar', 'CarrinhoController::visualizar');
$routes->delete('/carrinho/remover/(:num)', 'CarrinhoController::remover/$1');
$routes->patch('/carrinho/atualizar/(:num)', 'CarrinhoController::atualizar/$1');
$routes->delete('/carrinho/limpar', 'CarrinhoController::limpar');
