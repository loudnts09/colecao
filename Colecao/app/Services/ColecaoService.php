<?php

namespace App\Services;

use App\Models\Colecao;

class ColecaoService
{
    private $colecaoModel;

    public function __construct(Colecao $colecao)
    {
        $this->colecaoModel = $colecao;
    }

    public function index(string $pesquisa = null, bool $eLixeira = false)
    {
        return $this->colecaoModel
            ->when(!is_null($pesquisa), function ($q1) use ($pesquisa) {
                $q1->where('nome', 'LIKE', "%{$pesquisa}%")
                    ->orWhere('descricao', 'LIKE', "%{$pesquisa}%");
            })->when($eLixeira, function ($q2) {
                $q2->onlyTrashed();
            })
            ->orderBy('nome')
            ->paginate(10);
    }

    public function store(array $dados)
    {
        $this->colecaoModel->create($dados);
    }

    public function update(array $dados, Colecao $colecao)
    {
        //$colecao->update($dados);
        $colecao->nome = $dados['nome'];
        $colecao->descricao = $dados['descricao'];
        $colecao->save();   
    }

    public function delete(Colecao $colecao)
    {
        $colecao->delete();
    }

    public function restore(int $id){
        $this->colecaoModel->onlyTrashed()->find($id)->restore();
    }
}