@extends('template')
@section('conteudo')
    <h4>Dados da prateleira</h4>
    @if(session()->has('mensagem'))
        <div class="alert alert-{{ session('tipo') }}" role="alert">
            {{ session('mensagem') }}
        </div>
    @endif
    <table class="table table-striped table-bordered table-hover">
        <thead class="table-primary">
            <tr>
                <td colspan="5">
                    <form action="{{ route($rota, isset(request()->route()->parameters['eLixeira'])) }}" method="get" enctype="application/x-www-form-urlencoded">
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <button class="btn btn-success"><i class="bi bi-plus-square-fill"></i></button>
                            </span>
                            <input type="search" name="pesquisa" class="form-control" value="{{ $_GET['pesquisa'] ?? '' }}" placeholder="Buscar..." required autofocus>
                            <span class="input-group-text">
                                <button type="submit" class="btn btn-secundary"><i class="bi bi-search"></i></button>
                                <a href="{{ route($rota, isset(request()->route()->parameters['eLixeira'])) }}" class="btn"><i class="bi bi-x-square-fill"></i></a>
                                @if(isset(request()->route()->parameters['eLixeira']))
                                    <a href="{{ route($rota) }}" class="btn btn-success"><i class="bi bi-table"></i></a>
                                @else
                                    <a href="{{ route($rota, true) }}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                @endif
                            </span>
                        </div>
                    </form>
                </td>
            </tr>
            <tr>
                <th>Título</th>
                <th>Descrição</th>
                <th>Coleção</th>
                <th>{{ isset(request()->route()->parameters['eLixeira']) ? 'Excluído em' : 'Cadastrada em' }}</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>
            @forelse($dados as $dado)
                <tr>
                    <td width="20%">{{ $dado->nome }}</td>
                    <td width="35%">{{ Str::limit($dado->descricao, 30, '...', true) }}</td>
                    <td width=15%>{{ $dado->colecao->nome ?? ''}}</td>
                    <td width="15%">{{ isset(request()->route()->parameters['eLixeira']) ? $dado->deleted_at : $dado->created_at }}</td>
                    <td width="15%">
                        @if(isset(request()->route()->parameters['eLixeira']))
                            <a href="{{ route($rota . '.restore', $dado->id) }}" class="btn btn-success"><i class="bi bi-recycle"></i> Restaurar</a>
                        @else
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modelPrateleiraDelete" data-bs-prateleira-id="{{ $dado->id }}" data-bs-prateleira-nome="{{ $dado->nome }}"><i class="bi bi-trash"></i> Excluir</button>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Nenhuma coleção para exibir...</td>
                </tr>
            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5">
                    {{ $dados->appends($_GET)->links() }}
                </td>
            </tr>
        </tfoot>
    </table>
@endsection

@section('rodape')
    <nav class="navbar bg-primary" data-bs-theme="dark">
        <div class="container-fluid">
            <h5 class="mb-0 text-white">PRATELEIRAS - {{ date('Y') }}</h5>
        </div>
    </nav>

    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">PRATELEIRAS</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5>Deseja realmente sair?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Não</button>
                    <a href="{{ route('logoff') }}" class="btn btn-success">Sim</a>
                </div>
            </div>
        </div>
    </div>
@endsection