<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Time;
use App\Http\Requests\StoreTimesRequest;
use App\Http\Requests\UpdateTimesRequest;

class TimesController extends Controller
{

    public function index(Request $request)
    {
        //$times = Time::all();

        //dd($times);

        //$times = Team::where('pais', '=', 'Alemanha')->get();

         //$nome = 'Lucas Yurie'; //passando variável do back-end para o front-end
        //return view('times.index', ['nome' => $nome]);

        //$times = Time::all(); //buscando todos os times

        $query = $request->query('queryPesquisa', null); //('qual valor que eu espero buscar') queryPesquisa: name do input no index

        if ($query)
        {
            //pesquisar
            $times = Time::where('nome', 'LIKE', "%" . $query . "%")
                ->orWhere('pais', 'LIKE', "%" . $query . "%") //procurando por pais (orWhere = ou)
                ->orderBy('id', 'DESC')
                ->paginate(10)
                ->withQueryString();
            //withQueryString: faz a paginação mas mantém os parâmetros da url e não perder o valor de $query
        }
        else
        {
        // 'coluna para ordenar', 'tipo decrescente', paginate: paginação (itens de cada página)
        $times = Time::orderBy('id', 'DESC')->paginate(5);
        }

        return view('times.index', ['times' => $times, 'queryPesquisa' => $query]);

    }


    public function create()
    {
        return view('times.create');
    }

    public function store(StoreTimesRequest $request)
    {
        //dd($request->all());

        Time::create($request->all());

        return redirect(route('times-index'));
    }


    public function edit($id)
    {
        $time = Time::find($id);

        if (empty($time))
        {
            return redirect(route('times-index'));
        }

        return view('times.edit', ['time' => $time]);
    }


    public function update(UpdateTimesRequest $request, $id)
    {
        //dd($request, $id);

        $data = [
            'nome' => $request->nome,
            'pais' => $request->pais,
            'ano_fundacao' => $request->ano_fundacao,
        ];

        Time::where('id', $id)->update($data);
        return redirect(route('times-index'));

    }


    public function destroy($id)
    {
        Time::where('id', $id)->delete();

        return redirect(route('times-index'));
    }


}
