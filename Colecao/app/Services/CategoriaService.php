<?php

namespace App\Services;

use App\Models\Categoria;

class CategoriaService{
    
    private $categoriaModel;

    public function __construct(Categoria $categoria){
        $this->categoriaModel = $categoria;
    }

    public function index(string $pesquisa = null, bool $eLixeira = false)
    {
        return $this->categoriaModel
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

    public function delete(Categoria $categoria)
    {
        $categoria->delete();
    }

    public function restore(int $id){
        $this->categoriaModel->onlyTrashed()->find($id)->restore();
    }

}