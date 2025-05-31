<?php

namespace App\Http\Controllers;

use App\Services\CategoriaService;
use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    private $categoriaService;

    public function __construct(CategoriaService $categoriaService){
        $this->categoriaService = $categoriaService;
    }
    public function index(Request $request, bool $eLixeira = false){

        $dados = $this->categoriaService->index($request->pesquisa, $eLixeira);
        $rota = "categorias";
        return view("categoria.index", compact("dados", "rota"));
    }

    public function delete(Categoria $categoria){

        $this->categoriaService->delete($categoria);
        return redirect()->route('categorias')->with(['tipo' => 'success', 'mensagem' => 'Categoria deletada com sucesso!']);
    }

    public function restore(int $id){

        $this->categoriaService->restore($id);
        return redirect()->route('categorias', true)->with(['tipo' => 'success', 'mensagem' => 'Categoria restaurada com sucesso!']);
    }
}
    