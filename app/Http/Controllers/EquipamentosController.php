<?php

namespace App\Http\Controllers;

use App\Repositories\PessoaRepository;
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
        if($nomeExist->empresa == $request->empresa && $nomeExist->modelo == $request->modelo){
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
    public function show(EquipamentoRepository $model)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EquipamentoRepository $repository,PessoaRepository $model,string $id)
    {
        $equipamento = $repository->find($id);
        $pessoas = $model->all();
        $pessoas = $equipamento->pessoas;

        return view('equipamentos.edit', compact('pessoas', 'equipamento',));
    }


    public function retirarPessoa(EquipamentoRepository $model,string $id, string $idPessoa){
        $equipamento = $model->find($id);
        $equipamento->equipamentos()->detach($idPessoa);
        return redirect()->back()->with('success', 'Equipamento desassociado com Sucesso!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EquipamentoRepository $model, Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nome' => 'required',
            'empresa' => 'required',
            'marca' => 'required',
            'modelo' => 'required',
        ]);
        $model::update($id,$validatedData);
        return redirect()->back()->with('success', 'Equipamento Atualizado com Sucesso!');
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
