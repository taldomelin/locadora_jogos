<?php

namespace App\Http\Controllers;

use App\Http\Requests\JogosFormRequest;
use App\Http\Requests\UpdateJogosFormRequest;
use App\Models\Jogos;
use Illuminate\Http\Request;

class JogosController extends Controller
{
    public function cadastroJogos(JogosFormRequest $request)
    {
        $jogos = Jogos::create([
            'nome' => $request->nome,
            'preco' => $request->preco,
            'descricao' => $request->descricao,
            'classificacao' => $request->classificacao,
            'plataformas' => $request->plataformas,
            'desenvolvedor' => $request->desenvolvedor,
            'distribuidora' => $request->distribuidora,
            'categoria' => $request->categoria
        ]);
        return response()->json([
            "status" => true,
            "message" => "Jogo cadastrado com sucesso",
            "data" => $jogos
        ], 200);
    }

    public function pesquisarIdJogos($id)
    {
        $jogos = Jogos::find($id);
        if ($jogos == null) {
            return response()->json([
                'status' => false,
                'data' => "Jogo não encontrado"
            ]);
        }
        return response()->json([
            'status' => true,
            'data' => $jogos
        ]);
    }

    public function pesquisarNomeJogo(Request $request)
    {
        $jogos = Jogos::where('nome', 'like', '%' . $request->nome . '%')->get();
        if (count($jogos) > 0) {
            return response()->json([
                'status' => true,
                'data' => $jogos
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'Não há resultados para pesquisa.'
        ]);
    }

    public function retornarTodosJogos()
    {
        $jogos = Jogos::all();
        if ($jogos->count() > 0) {
            return response()->json([
                'status' => true,
                'data' => $jogos
            ]);
        } else {
            return response()->json([
                'status' => false,
                'data' => "Nenhum jogo registrado"
            ]);
        }
}

    public function atualizarJogos(UpdateJogosFormRequest $request)
    {
        $jogos = Jogos::find($request->id);
        if (!isset($jogos)) {
            return response()->json([
                'status' => false,
                'message' => "Jogo não encontrado"
            ]);
        }
        if (isset($request->nome)) {
            $jogos->nome = $request->nome;
        }
        if (isset($request->preco)) {
            $jogos->preco = $request->preco;
        }
        if (isset($request->descricao)) {
            $jogos->descricao = $request->descricao;
        }
        if (isset($request->classificacao)) {
            $jogos->classificacao = $request->classificacao;
        }
        if (isset($request->plataformas)) {
            $jogos->plataformas = $request->plataformas;
        }
        if (isset($request->desenvolvedor)) {
            $jogos->desenvolvedor = $request->desenvolvedor;
        }
        if (isset($request->distribuidora)) {
            $jogos->distribuidora = $request->distribuidora;
        }
        if (isset($request->categoria)) {
            $jogos->categoria = $request->categoria;
        }
        $jogos->update();
        return response()->json([
            'status' => true,
            'message' => "Jogo atualizado"
        ]);
    }

    public function excluirJogos($id)
    {
        $jogos = Jogos::find($id);
        if (!isset($jogos)) {
            return response()->json([
                'status' => false,
                'message' => "Jogo não encontrado"
            ]);
        }
        $jogos->delete();
        return response()->json([
            'status' => true,
            'message' => "Jogo excluído com sucesso"
        ]);
    }

    public function checarUnico(Request $request)
    {
        $nome = $request->nome;
        $jogos = Jogos::where('nome', $nome)->first();
        if ($jogos) {
            return response()->json([
                'status' => false,
                'message' => "Nome: '$nome' já cadastrado no sistema"
            ]);
        } else {
            return response()->json([
                'status' => true,
                'message' => "Nome: '$nome' está disponível"
            ]);
        }
    }
}