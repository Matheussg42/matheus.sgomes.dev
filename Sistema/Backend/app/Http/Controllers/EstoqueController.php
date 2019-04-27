<?php

namespace App\Http\Controllers;

use App\Estoque;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
//Estoque Request
use App\Http\Requests\Estoque\StoreEstoque;
use App\Http\Requests\Estoque\UpdateEstoque;
//Estoque Resource
use App\Transformers\Estoque\EstoqueResource;
use App\Transformers\Estoque\EstoqueResourceCollection;
//Estoque Repository
use App\Repositories\Estoque\EstoqueRepository;

use App\Services\ResponseService;

class EstoqueController extends Controller
{

    private $estoque;

    public function __construct(EstoqueRepository $estoque)
    {
        $this->estoque = $estoque;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new EstoqueResourceCollection($this->estoque->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEstoque $request)
    {
        try{        
            $data = $this->estoque->create($request->all());
        }catch(\Throwable|\Exception $e){
            return ResponseService::exception('estoques.store',null,$e);
        }
        return new EstoqueResource($data,array('type' => 'store','route' => 'estoques.store'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Estoque  $estoque
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $data = $this->estoque->find($id);
        }catch(\Throwable|\Exception $e){
            return ResponseService::exception('estoques.show',$id,$e);
        }
        return new EstoqueResource($data,array('type' => 'show','route' => 'estoques.show'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Estoque  $estoque
     * @return \Illuminate\Http\Response
     */
    public function findByLoja($id)
    {
        try{
            $data = $this->estoque->findBy('fk_id_loja', $id);
        }catch(\Throwable|\Exception $e){
            return ResponseService::exception('estoques.show',$id,$e);
        }
        return new EstoqueResourceCollection($data,array('type' => 'show','route' => 'estoques.show'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Estoque  $estoque
     * @return \Illuminate\Http\Response
     */
    public function findByProduto($id)
    {
        try{
            $data = $this->estoque->findBy('fk_id_produto', $id);
        }catch(\Throwable|\Exception $e){
            return ResponseService::exception('estoques.show',$id,$e);
        }
        return new EstoqueResourceCollection($data,array('type' => 'show','route' => 'estoques.show'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Estoque  $estoque
     * @return \Illuminate\Http\Response
     */
    public function update($id, UpdateEstoque $request)
    {
        try{
            $data = $this->estoque->update($id,$request->all());
        }catch(\Throwable|\Exception $e){
            return ResponseService::exception('estoques.update',$id,$e);
        }
        return new EstoqueResource($data,array('type' => 'update','route' => 'estoques.update'));   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Estoque  $estoque
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $data = $this->estoque->destroy($id);
        }catch(\Throwable|\Exception $e){
            return ResponseService::exception('estoques.destroy',$id,$e);
        }
        return new EstoqueResource($data,array('type' => 'destroy','route' => 'estoques.destroy'));
    }
}
