<?php

namespace App\Repositories\Loja;
use App\Loja;
use App\Estoque;
use DB;

class LojaRepository
{

    /**
     * Todas as Lojas
     * 
     * @return lojas
     */
    public function all(){
        return Loja::all();
    }

    /**
     * Criar nova Loja
     * 
     * @param  fields
     * @return loja
     */
    public function create($fields){
        return Loja::create($fields);
    }

    /**
     * Encontra Loja pelo Id
     * 
     * @param  id
     * @return loja
     */
    public function find($id){
        $loja = Loja::find($id);
        if($loja){
            return $loja;
        }else{
            throw new \Exception('Nada Encontrado',-404);
        }
    }

    /**
     * Atualiza loja
     * 
     * @param  id
     * @param  fields
     * @return loja
     */
    public function update($id,$fields){
        $loja = $this->find($id);
        $loja->update($fields);
        return $loja;
    }

    /**
     * Deleta loja
     * 
     * @param  id
     * @return loja
     */
    public function destroy($id){
        $find = Estoque::where('fk_id_loja', $id)->count();
        if($find >= 1){
            throw new \Exception('Esta loja possui um estoque. Apague-o primeiro',-403);
        }else{
            $loja = $this->find($id);
            $loja->delete();
            return $loja;
        }
    }

}