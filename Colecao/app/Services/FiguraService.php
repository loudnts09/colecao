<?php

namespace App\Services;

use App\Models\Figura;

class FiguraService{
    
    private $figuraModel;

    public function __construct(Figura $figura){
        $this->figuraModel = $figura;
    }

    public function index(string $pesquisa = null, bool $eLixeira = false)
    {
        return $this->figuraModel
            ->with("categoria", "prateleira")
            ->when(!is_null($pesquisa), function ($q1) use ($pesquisa) {
                $q1->where('nome', 'LIKE', "%{$pesquisa}%")
                    ->orWhere('descricao', 'LIKE', "%{$pesquisa}%");
            })->when($eLixeira, function ($q2) {
                $q2->onlyTrashed();
            })
            ->orderBy('nome')
            ->paginate(10);
    }

    public function delete(Figura $figura)
    {
        $figura->delete();
    }

    public function restore(int $id){
        $this->figuraModel->onlyTrashed()->find($id)->restore();
    }

}