<?php

namespace App\Http\Controllers;

use App\Models\Colecao;
use App\Services\ColecaoService;
use Illuminate\Http\Request;

class ColecaoController extends Controller
{
    private $colecaoService;

    public function __construct(ColecaoService $colecaoService)
    {
        $this->colecaoService = $colecaoService;
    }

    public function index(Request $request, bool $eLixeira = false)
    {
        $dados = $this->colecaoService->index($request->pesquisa, $eLixeira);
        $rota = "colecoes";
        return view('colecao.index', compact("dados", "rota"));
    }

    public function store(Request $request)
    {
        if(!empty($request->nome)){
            $this->colecaoService->store($request->except('_token'));
            return redirect()->route('colecoes')->with(['tipo' => 'success', 'mensagem' => 'Coleção cadastrada com sucesso!']);
        } else {
            return redirect()->back()->with(['tipo' => 'warning', 'mensagem' => 'Nome da coleção é obrigatório!']);
        }
    }

    public function edit(Colecao $colecao){
        $dados = $this->colecaoService->index(null);
        $rota = "colecoes";
        return view('colecao.index', compact('dados', 'colecao', 'rota'));
    }

    public function update(Request $request, Colecao $colecao){
        if(!empty($request->nome)){
            $this->colecaoService->update($request->except(['_token', '_method']), $colecao);
            return redirect()->route('colecoes.edit', $colecao->id)->with(['tipo' => 'success', 'mensagem' => 'Coleção atualizada com sucesso!']);
        } else {
            return redirect()->back()->with(['tipo' => 'warning', 'mensagem' => 'Nome da coleção é obrigatório!']);
        }
    }

    public function delete(Colecao $colecao){
        $this->colecaoService->delete($colecao);
        return redirect()->route('colecoes')->with(['tipo' => 'success', 'mensagem' => 'Coleção deletada com sucesso!']);
    }

    public function restore(int $id){
        $this->colecaoService->restore($id);
        return redirect()->route('colecoes', true)->with(['tipo' => 'success', 'mensagem' => 'Coleção restaurada com sucesso!']);
    }
}