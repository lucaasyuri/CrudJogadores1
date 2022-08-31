<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jogadore;
use App\Models\Time;
use App\Http\Requests\StoreJogadoresRequest;
use App\Http\Requests\UpdateJogadoresRequest;

class JogadoresController extends Controller
{
    
    public function index(Request $request)
    {
        //$jogadores = Jogadore::all(); //buscando todos os jogadores

        $query = $request->query('queryPesquisa', null);

        if ($query)
        {
            //pesquisa
            $jogadores = Jogadore::where('nome', 'LIKE', "%" . $query . "%")
                ->orWhere('posicao', 'LIKE', "%" . $query . "%") //procurando por pais (orWhere = ou)
                ->orWhere('pais', 'LIKE', "%" . $query . "%")
                ->orderBy('id', 'DESC')
                ->paginate(2)
                ->withQueryString();
            //withQueryString: faz a paginação mas mantém os parâmetros da url e não perder o valor de $query
        }
        else
        {
            // 'coluna para ordenar', 'tipo decrescente', paginate: paginação (itens de cada página)
            $jogadores = Jogadore::orderBy('id', 'DESC')->paginate(5);
        }     

        return view('jogadores.index', ['jogadores' => $jogadores, 'queryPesquisa' => $query]);

    }

    public function create()
    {
        $times = Time::all();

        return view('jogadores.create', ['times' => $times]);
    }

    public function store(StoreJogadoresRequest $request)
    {
        Jogadore::create($request->all());

        return redirect(route('jogadores-index'));
    }

    public function edit($id)
    {
        $jogador = Jogadore::where('id', $id)->first();

        if (!empty($jogador))
        {
            //die('encontrou jogador');

            $times = Time::all();

            return view('jogadores.edit', ['times' => $times, 'jogador' => $jogador]);
        }

        return redirect(route('jogadores-index'));

    }

    public function update(UpdateJogadoresRequest $request, $id)
    {
        $date = [
            'nome' => $request->nome,
            'posicao' => $request->posicao,
            'numero' => $request->numero,
            'pais' => $request->pais,
            'nascimento' => $request->nascimento,
            'time_id' => $request->time_id
        ];

        Jogadore::where('id', $id)->update($date);

        return redirect(route('jogadores-index'));

    }

    public function destroy($id)
    {
        Jogadore::where('id', $id)->delete();

        return redirect(route('jogadores-index'));
    }

}
