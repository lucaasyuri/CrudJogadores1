@extends('layouts.app')

@section('content')
    
    <div class="container">
        <div class="row">

            <div class="col-sm-12 col-md-6 mt-5">
                <h2>Jogadores</h2>
            </div>

            <div class="col-sm-12 col-md-6 mt-5" style="text-align: right;">                
                <a href="{{ route('jogadores-create') }}" class="btn btn-md btn-success btn-sm">Adicionar</a>
            </div>

        </div>

        <div class="row">
            <div class="col-sm-0 col-md-6"></div>

            <div class="col-sm-12 col-md-6">
                <form>
                    <div class="input-group md-3 mt-2">
                        <input type="text" name="queryPesquisa" class="form-control form-control-sm" placeholder="Pesquisar..." value="{{ $queryPesquisa }}">
                        <div class="input-group-append">
                            <button class=" btn btn-primary btn-sm" type="submit">
                                Pesquisar
                            </button>
                            <a href="{{ route('jogadores-index') }}" class=" btn btn-secondary btn-sm">Limpar</a>
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
                                <th>Posição</th>
                                <th>Número</th>
                                <th>País</th>
                                <th>Data de nascimento</th>
                                <th>Time</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jogadores as $jogador)
                                <tr>
                                    <td>{{ $jogador->id }}</td>
                                    <td>{{ $jogador->nome }}</td>
                                    <td>{{ $jogador->posicao }}</td>
                                    <td>{{ $jogador->numero }}</td>
                                    <td>{{ $jogador->pais }}</td>
                                    <td>{{ $jogador->nascimento->format('d-m-Y') }}</td>
                                    <td>{{ $jogador->time->nome }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('jogadores-edit', ['id' => $jogador->id]) }}" class="btn btn-sm btn-primary" style="margin-right: 3px;">Editar</a>

                                        <form action="{{ route('jogadores-destroy', ['id' => $jogador->id]) }}" method="POST">
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
                        {{ $jogadores->links() }}
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection