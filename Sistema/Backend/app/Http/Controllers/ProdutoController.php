<?php

namespace App\Http\Controllers;

use App\Produto;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
//Produto Request
use App\Http\Requests\Produto\StoreProduto;
use App\Http\Requests\Produto\UpdateProduto;
//Produto Resource
use App\Transformers\Produto\ProdutoResource;
use App\Transformers\Produto\ProdutoResourceCollection;
//Produto Repository
use App\Repositories\Produto\ProdutoRepository;

use App\Services\ResponseService;

class ProdutoController extends Controller
{

    private $produto;

    public function __construct(ProdutoRepository $produto)
    {
        $this->produto = $produto;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new ProdutoResourceCollection($this->produto->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduto $request)
    {
        try{        
            $data = $this->produto->create($request->all());
        }catch(\Throwable|\Exception $e){
            return ResponseService::exception('produtos.store',null,$e);
        }
        return new ProdutoResource($data,array('type' => 'store','route' => 'produtos.store'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $data = $this->produto->find($id);
        }catch(\Throwable|\Exception $e){
            return ResponseService::exception('produtos.show',$id,$e);
        }
        return new ProdutoResource($data,array('type' => 'show','route' => 'produtos.show'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update($id, UpdateProduto $request)
    {
        try{
            $data = $this->produto->update($id,$request->all());
        }catch(\Throwable|\Exception $e){
            return ResponseService::exception('produtos.update',$id,$e);
        }
        return new ProdutoResource($data,array('type' => 'update','route' => 'produtos.update'));   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $data = $this->produto->destroy($id);
        }catch(\Throwable|\Exception $e){
            return ResponseService::exception('produtos.destroy',$id,$e);
        }
        return new ProdutoResource($data,array('type' => 'destroy','route' => 'produtos.destroy'));
    }
}
