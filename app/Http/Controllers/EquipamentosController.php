<?php

namespace App\Http\Controllers;

use App\Repositories\EquipamentoRepository;
use Illuminate\Http\Request;

class EquipamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('equipamentos.create');
    }

    public function list(EquipamentoRepository $model)
    {
        $equipamentos = $model::all();
        return view('equipamentos.list', ['equipamentos' => $equipamentos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(EquipamentoRepository $model, Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required',
            'empresa' => 'required',
            'modelo' => 'required',
            'marca' => 'required'
        ]);
        $nomeExist = $model->findByNome($request->nome);
        $empresaExist = $model->findByEmpresa($request->empresa);
        if($nomeExist && $empresaExist){
            return redirect()->route('equipamento.create')->with('denied', 'Equipamento Já Cadastrado anteriormente');
        }
        $model::create($validatedData);
        return redirect()->route('equipamento.create')->with('success', 'Equipamento Registrado com Sucesso!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(EquipamentoRepository $model,string $id)
    {
        $equipamento = $model::find($id);
        dd($equipamento);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EquipamentoRepository $model,string $id)
    {
        $model->delete($id);
        return redirect()->route('equipamento.index')->with('success', 'Equipamento excluido com Sucesso!');
    }
}
