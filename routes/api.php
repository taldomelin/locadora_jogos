<?php

use App\Http\Controllers\JogosController;
use App\Models\Jogos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('cadastro/jogos', [JogosController::class, 'store']);
Route::get('pesquisa/jogo/{id}', [JogosController::class, 'pesquisaPorId']);
Route::post('buscaNome/jogo', [JogosController::class, 'pesquisarPorNomeJogo']);
Route::get('retornarTodos/jogos', [JogosController::class, 'retornarTodosJogos']);
Route::put('atualizar/jogos', [JogosController::class, 'atualizarJogos']);
Route::delete('excluir/jogos/{id}', [JogosController::class, 'excluirJogos']);