<?php

namespace App\Http\Controllers;

use App\Loja;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
//Loja Request
use App\Http\Requests\Loja\StoreLoja;
use App\Http\Requests\Loja\UpdateLoja;
//Loja Resource
use App\Transformers\Loja\LojaResource;
use App\Transformers\Loja\LojaResourceCollection;
//Loja Repository
use App\Repositories\Loja\LojaRepository;

use App\Services\ResponseService;

class LojaController extends Controller
{

    private $loja;

    public function __construct(LojaRepository $loja)
    {
        $this->loja = $loja;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new LojaResourceCollection($this->loja->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLoja $request)
    {
        try{        
            $data = $this->loja->create($request->all());
        }catch(\Throwable|\Exception $e){
            return ResponseService::exception('lojas.store',null,$e);
        }
        return new LojaResource($data,array('type' => 'store','route' => 'lojas.store'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Loja  $loja
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $data = $this->loja->find($id);
        }catch(\Throwable|\Exception $e){
            return ResponseService::exception('lojas.show',$id,$e);
        }
        return new LojaResource($data,array('type' => 'show','route' => 'lojas.show'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Loja  $loja
     * @return \Illuminate\Http\Response
     */
    public function update($id, UpdateLoja $request)
    {
        try{
            $data = $this->loja->update($id,$request->all());
        }catch(\Throwable|\Exception $e){
            return ResponseService::exception('lojas.update',$id,$e);
        }
        return new LojaResource($data,array('type' => 'update','route' => 'lojas.update'));   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Loja  $loja
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $data = $this->loja->destroy($id);
        }catch(\Throwable|\Exception $e){
            return ResponseService::exception('lojas.destroy',$id,$e);
        }
        return new LojaResource($data,array('type' => 'destroy','route' => 'lojas.destroy'));
    }
}
