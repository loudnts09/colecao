<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prateleira;
use App\Services\PrateleiraService;

class PrateleiraController extends Controller
{
    protected $prateleiraService;

    public function __construct(PrateleiraService $prateleiraService)
    {
        $this->prateleiraService = $prateleiraService;
    }
    public function index(Request $request, bool $eLixeira = false){
        $dados = $this->prateleiraService->index($request->pesquisa, $eLixeira);
        $rota = "prateleiras";
        return view("prateleira.index", compact("dados", "rota"));
    }

    public function delete(Prateleira $prateleira){
        $this->prateleiraService->delete($prateleira);
        return redirect()->route('prateleiras')->with(['tipo' => 'success', 'mensagem' => 'Prateleiras deletada com sucesso!']);
    }

    public function restore(int $id){

        $this->prateleiraService->restore($id);
        return redirect()->route('prateleiras', true)->with(['tipo' => 'success', 'mensagem' => 'Prateleiras restaurada com sucesso!']);
    }  
}
