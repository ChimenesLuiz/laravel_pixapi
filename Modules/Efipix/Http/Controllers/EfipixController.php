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
        return view('efipix::pix.index', [
            'pixs' => $pixs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(Request $request)
    {
        $flash = $request -> session() -> all();
        return view('efipix::pix.create', ['flash' => $flash]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(StorePixRequest $request)
    {   
        $request -> validated();

        $created = $this -> pix -> create($request -> except(['_token', 'btn_submit']));
        if ($created)
        {
            
            return redirect() -> route('efipix.index') -> with('message', 'Cadastrado com Sucesso!');
        }
        else
        {
            die('error');
        }

        
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('efipix::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $data = $this -> pix -> findOrFail($id);
        return view('efipix::pix.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
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

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $created = $this -> pix -> destroy($id);
        if ($created)
        {
            return redirect() -> route('efipix.index') -> with('message', 'Excluido com Sucesso!');
        }
        else
        {
            die('erro');
        }
    }
}
