<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estoque extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['fk_id_produto','fk_id_loja', 'quantidade'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Seta que o estoque pertence a loja
     */
    public function loja(){
        return $this->belongsTo('App\Loja', 'fk_id_loja');
    }
}
