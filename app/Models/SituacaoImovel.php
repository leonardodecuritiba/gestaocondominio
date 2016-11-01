<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SituacaoImovel extends Model
{
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'descricao',
        'percencual_desconto'
    ];

    // ******************** RELASHIONSHIP ******************************
    // ************************** hasMany ******************************
    public function imoveis()
    {
        return $this->hasOne('App\Models\Imovel', 'idsituacao_imovel');
    }
}

