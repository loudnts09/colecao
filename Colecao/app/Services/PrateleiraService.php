<?php

namespace App\Services;

use App\Models\Prateleira;

class PrateleiraService{
    
    private $prateleiraModel;

    public function __construct(Prateleira $prateleira){
        $this->prateleiraModel = $prateleira;
    }

    public function index(string $pesquisa = null, bool $eLixeira = false)
    {
        return $this->prateleiraModel
            ->with("colecao")
            ->when(!is_null($pesquisa), function ($q1) use ($pesquisa) {
                $q1->where('nome', 'LIKE', "%{$pesquisa}%")
                    ->orWhere('descricao', 'LIKE', "%{$pesquisa}%");
            })->when($eLixeira, function ($q2) {
                $q2->onlyTrashed();
            })
            ->orderBy('nome')
            ->paginate(10);
    }

    public function delete(Prateleira $prateleira)
    {
        $prateleira->delete();
    }

    public function restore(int $id){
        $this->prateleiraModel->onlyTrashed()->find($id)->restore();
    }

}