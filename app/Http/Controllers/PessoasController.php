<?php

namespace App\Http\Controllers;

use App\Repositories\EquipamentoRepository;
use App\Repositories\PessoaRepository;
use Illuminate\Http\Request;

class PessoasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pessoas.create');
    }

    public function list(PessoaRepository $model)
    {

        $pessoas = $model::all();
        return view('pessoas.list',['pessoas' => $pessoas]);

    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(PessoaRepository $model, Request $request)
    {
        if($model->findByName($request->nome)){
            return redirect()->back()->with('denied', 'Pessoa já cadastrada anteriormente.');
        }
        $validatedData = $request->validate([
            'nome' => 'required',
            'sobrenome' => 'required',
            'setor' => 'required',
        ]);
        $model::create($validatedData);
        return redirect()->back()->with('success', 'Pessoa cadastrada com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EquipamentoRepository $equipamento,PessoaRepository $model,string $id)
    {
        $equipamentos = $equipamento->all();
        $pessoa = $model->find($id);
        $equipamentosUtilizados = $pessoa->equipamentos;

        return view('pessoas.edit', compact('pessoa','equipamentosUtilizados', 'equipamentos'));
    }

    public function store(PessoaRepository $pessoa,EquipamentoRepository $equipamento,Request $request,string $id){

        $pessoa = $pessoa->find($id);
        $equipamento = $equipamento->find($request->equipamento);

        if (!$pessoa || !$equipamento) {
            return redirect()->back()->with('error', 'Pessoa ou equipamento não encontrado.');
        }

        $pessoa->equipamentos()->attach($equipamento);

    return redirect()->back()->with('success', 'Equipamento associado à pessoa com sucesso.');
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(PessoaRepository $model,Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nome' => 'required',
            'sobrenome' => 'required',
            'setor' => 'required',
        ]);
        $model::update($id,$validatedData);
        return redirect()->back()->with('success', 'Usuário Atualizado com Sucesso!');
    }

    public function retirarEquipamento(PessoaRepository $model,string $id, string $idEquipamento){
        $pessoa = $model->find($id);
        $pessoa->equipamentos()->detach($idEquipamento);
        return redirect()->back()->with('success', 'Equipamento desassociado com Sucesso!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PessoaRepository $model,string $id)
    {
        $pessoa = $model->find($id);

        $pessoa->equipamentos()->detach();
        $pessoa->delete($id);
        return redirect()->route('pessoa.index')->with('success', 'Pessoa excluida com Sucesso!');
    }
}
