<?php

use App\Http\Controllers\JogosController;
use App\Models\Jogos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('register/games', [JogosController::class, 'cadastroJogos']);

Route::get('search/games/by/{id}', [JogosController::class, 'pesquisarIdJogos']);

Route::post('search/games/by/nome', [JogosController::class, 'pesquisarNomeJogo']);

Route::get('return/all/games', [JogosController::class, 'retornarTodosJogos']);

Route::put('update/game', [JogosController::class, 'atualizarJogos']);

Route::delete('delete/game/{id}', [JogosController::class, 'excluirJogos']);