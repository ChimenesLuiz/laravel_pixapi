<?php

namespace Modules\Efipix\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Efipix\Entities\Pixs;
use Modules\Efipix\Http\Requests\StorePixRequest;

class EfipixController extends Controller
{
    public Pixs $pix;

    public function __construct()
    {
        $this -> pix = new Pixs();
    }

    public function index()
    {
        $pixs = $this -> pix -> all();
        return view('efipix::pix.index') -> with('pixs', $pixs);
    }

    public function create(Request $request)
    {
        $flash = $request -> session() -> all();
        return view('efipix::pix.create') -> with('flash', $flash);
    }


    public function store(StorePixRequest $request)
    {   
        $request -> validated();

        $this -> pix -> create($request -> except(['_token', 'btn_submit'])); 

        return redirect() -> route('efipix.index') -> with('message', 'Cadastrado com Sucesso!');
    }


    public function show($id)
    {
        return view('efipix::show');
    }

    public function edit($id)
    {
        $data = $this -> pix -> findOrFail($id);
        return view('efipix::pix.edit') -> with('data', $data);
    }

    public function update(StorePixRequest $request, $id)
    {
        $request -> validated();
        $object = $this -> pix::find($id);

        $object -> nome_pagante = $request -> nome_pagante;
        $object -> cpf_pagante = $request -> cpf_pagante;
        $object -> nome_recebedor = $request -> nome_recebedor;
        $object -> tipo = $request -> tipo;
        $object -> chave = $request -> chave;
        $object -> valor = $request -> valor;

        $object -> save();

        return redirect() -> route('efipix.index') -> with('message', 'Editado com Sucesso!'); 
    }

    public function destroy($id)
    {
        $this -> pix -> destroy($id);
        return redirect() -> route('efipix.index') -> with('message', 'Excluido com Sucesso!');
    }
}
