@extends('layouts.app')

@section('content')
    
    <div class="container">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6 mt-5">
                    <h2>Editar Time</h2>
                </div>

                <div class="col-sm-12 col-md-6 mt-5" style="text-align: right;">                
                    <a href="{{ route('times-index') }}" class="btn btn-md btn-info btn-sm">Voltar</a>
                </div>
            </div>

            <div class="row pt-3 mt-5">
                <div class="col-sm-12">
                    <h5>Informe os dados do time:</h5>
                    <br>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>
                                        {{ $error }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="col-sm-12">
                    <form action="{{ route('times-update', ['id' => $time->id]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group pt-2">
                            <label for="nome">Nome:</label>
                            <input value = "{{ $time->nome }}" type="text" id="nome" name="nome" required class="form-control" placeholder="Informe os dados do time...">
                        </div>

                        <br>

                        <div class="form-group">
                            <label for="pais">País:</label>
                            <input value = "{{ $time->pais }}" type="text" id="pais" name="pais" required class="form-control" placeholder="Informe um país para o time...">
                        </div>

                        <br>
                        
                        <div class="form-group">
                        <label for="ano_fundacao">Ano fundação:</label>
                            <input value = "{{ $time->ano_fundacao }}" type="number" id="ano_fundacao" name="ano_fundacao" required class="form-control" placeholder="Informe o ano...">
                        </div>

                        <br>

                        <div class="form-group pt-4">
                            <button type="submit" class="btn btn-sm btn-primary">Salvar</button>
                        </div>


                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection