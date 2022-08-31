@extends('layouts.app')

@section('content')
    
    <div class="container">
        <div class="row">

            <div class="col-sm-12 col-md-6 mt-5">
                <h2>Times</h2>
            </div>

            <div class="col-sm-12 col-md-6 mt-5" style="text-align: right;">                
                <a href="{{ route('times-create') }}" class="btn btn-md btn-success btn-sm">Adicionar</a>
            </div>

        </div>

        <div class="row">
            <div class="col-sm-0 col-md-6"></div>

            <div class="col-sm-12 col-md-6">
                <form method="GET">
                    <div class="input-group mb-3 mt-2">
                        <input type="text" class="form-control form-control-sm" placeholder="Pesquisar..." name="queryPesquisa" value="{{ $queryPesquisa }}">
                        <div class="input-group-append">
                            <button class=" btn btn-primary btn-sm" type="submit">
                                Pesquisar
                            </button>
                            <a href="{{ route('times-index') }}" class="btn btn-secondary btn-sm">Limpar</a>
                        </div>
                    </div>
                </form>
            </div>

        </div>

        <div class="row pt-3 mt-2">            
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nome</th>
                                <th>País</th>
                                <th>Ano Fundação</th>
                                <th>Número de jogadores</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($times as $time)
                                <tr>
                                    <td>{{ $time->id }}</td>
                                    <td>{{ $time->nome }}</td>
                                    <td>{{ $time->pais }}</td>
                                    <td>{{ $time->ano_fundacao }}</td>
                                    <td>{{ count($time->jogadores) }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('times-edit', ['id' => $time->id]) }}" class="btn btn-sm btn-primary" style="margin-right: 3px;">Editar</a>

                                        <form action="{{ route('times-destroy', ['id' => $time->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Deletar</button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <hr>

                    <div class="pagination justify-content-end">
                        {{ $times->links() }}
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection