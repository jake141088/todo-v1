<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListaDeTarefas;

class TarefasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tarefas = ListaDeTarefas::orderBy('id', 'desc')->get();
        return Response()->json($tarefas, 200);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tarefa = new ListaDeTarefas();
        $tarefa->texto = $request->input('texto');
        $tarefa->autor = $request->input('autor');
        $tarefa->status = $request->input('status');
        if($tarefa->save()){
            return Response("1",201);
        }
        else{
            return Response("0",304);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tarefa = ListaDeTarefas::find($id);
        if($tarefa->delete()){
            return Response("1",200);
        }
        else{
            return Response("0",304);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tarefa = ListaDeTarefas::find($id);
        $tarefa->status = $request->input('status');
        if($tarefa->save()){
            return Response()->json($tarefa, 201);
        }
        else{
            return Response("0",304);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tarefa = ListaDeTarefas::find($id);
        if ($tarefa->delete()) {
            return response()->json(['success' => true], 200);
        } else {
            return response()->json(['success' => false], 304);
        }
    }
}