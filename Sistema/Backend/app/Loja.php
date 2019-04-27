<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Loja extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['nome'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Seta que a loja tem estoque
     */
    public function estoque()
    {
        return $this->hasMany('App\Estoque', 'fk_id_loja');
    }
}
