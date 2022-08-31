@extends('layouts.app')

@section('content')
    
    <div class="container">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6 mt-5">
                    <h2>Editar Jogador</h2>
                </div>

                <div class="col-sm-12 col-md-6 mt-5" style="text-align: right;">                
                    <a href="{{ route('jogadores-index') }}" class="btn btn-md btn-info btn-sm">Voltar</a>
                </div>
            </div>

            <div class="row pt-3 mt-5">
                <div class="col-sm-12">
                    <h5>Informe os dados do Jogador:</h5>
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
                    <form action="{{ route('jogadores-update', ['id' => $jogador->id]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group pt-2">
                            <label for="nome">Nome:</label>
                            <input value="{{ $jogador->nome }}" type="text" id="nome" name="nome" required class="form-control" placeholder="Informe um nome para o jogador...">
                        </div>

                        <br>

                        <div class="form-group">
                            <label for="pais">País:</label>
                            <input value="{{ $jogador->pais }}" type="text" id="pais" name="pais" required class="form-control" placeholder="Informe um país para o jogador...">
                        </div>

                        <br>
                        
                        <div class="form-group">
                        <label for="numero">Número:</label>
                            <input value="{{ $jogador->numero }}" type="number" min="0" max="99" step="1" id="numero" name="numero" required class="form-control" placeholder="Informe o número do jogador...">
                            <!-- step="1": apenas números inteiros -->
                        </div>

                        <br>

                        <div class="form-group">
                            <label for="posicao">Posição:</label>
                            <input value="{{ $jogador->posicao }}" type="text" id="posicao" name="posicao" required class="form-control" placeholder="Informe uma posição para o jogador...">
                        </div>

                        <br>

                        <div class="form-group">
                            <label for="nascimento">Data de nascimento:</label>
                            <input value="{{ $jogador->nascimento->format('Y-m-d') }}" type="date" id="nascimento" name="nascimento" class="form-control" placeholder="Informe uma data de nascimento para o jogador...">
                        </div>

                        <br>

                        <div class="form-group">
                            <label for="time_id">Time:</label>
                            <select name="time_id" id="time_id" class="form-control" required>
                                <option>Selecione o time do jogador...</option>
                                @foreach($times as $time)
                                    <option <?= $jogador->time_id == $time->id ? 'selected' : '' ?> value="{{ $time->id }}"> {{ $time->nome }} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group pt-4">
                            <button type="submit" class="btn btn-sm btn-primary">Salvar</button>
                        </div>


                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection