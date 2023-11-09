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
            
            return redirect() -> route('efipix.index') -> with('message_success', 'Cadastrado com Sucesso!');
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
    public function update(Request $request, $id)
    {
        //
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
            return redirect() -> route('efipix.index') -> with('message_destroy', 'Excluido com Sucesso!');
        }
        else
        {
            die('erro');
        }
    }
}
