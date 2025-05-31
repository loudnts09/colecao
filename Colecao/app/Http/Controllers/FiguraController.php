<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Figura;
use App\Services\FiguraService;

class FiguraController extends Controller
{
    protected $figuraService;

    public function __construct(FiguraService $figuraService)
    {
        $this->figuraService = $figuraService;
    }

    public function index(Request $request, bool $eLixeira = false){
        $dados = $this->figuraService->index($request->pesquisa, $eLixeira);
        $rota = "figuras";
        return view("figura.index", compact("dados", "rota"));
    }

    public function delete(Figura $figura){
        $this->figuraService->delete($figura);
        return redirect()->route('figuras')->with(['tipo' => 'success', 'mensagem' => 'Figuras deletada com sucesso!']);
    }

    public function restore(int $id){

        $this->figuraService->restore($id);
        return redirect()->route('figuras', true)->with(['tipo' => 'success', 'mensagem' => 'Figuras restaurada com sucesso!']);
    }    
}
