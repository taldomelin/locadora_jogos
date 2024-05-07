<?php

namespace App\Http\Controllers;

use App\Models\Jogos;
use Illuminate\Http\Request;

class JogosController extends Controller
{
    public function jogos(Request $request)
    {
        $jogos = Jogos::create([
            'nome' => $request->nome,
            'preco' => $request->preco,
            'descricao' => $request->descricao,
            'classificacao' => $request->classificacao,
            'plataforma' => $request->plataforma,
            'desenvolvedor' => $request->desenvolvedor,
            'distribuidora' => $request->distribuidora
        ]);
        return response()->json([
            "success" => true,
            "message" => "Jogo Cadastrado",
            "data" => $jogos
        ]);
    }
}
