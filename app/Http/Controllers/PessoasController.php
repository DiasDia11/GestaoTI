<?php

namespace App\Http\Controllers;

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
        $validatedData = $request->validate([
            'nome' => 'required',
            'setor' => 'required',
        ]);
        $model::create($validatedData);
        return view('pessoas.create');
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PessoaRepository $model,string $id)
    {
        $pessoa = $model->find($id);
        return view('pessoas.edit', compact('pessoa'));
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
    public function destroy(PessoaRepository $model,string $id)
    {
        $model->delete($id);
        return redirect()->route('pessoa.index')->with('success', 'Pessoa excluida com Sucesso!');
    }
}
