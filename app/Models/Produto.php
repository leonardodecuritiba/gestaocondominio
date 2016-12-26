<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idunidade_produto',
        'idgrupo_produto',
        'referencia',
        'descricao',
        'quantidade_minima',
        'quantidade_maxima',
        'origem'
    ];
    // ******************** RELASHIONSHIP ******************************
    // ************************** belongsTo ****************************
    public function unidade_produto()
    {
        return $this->belongsTo('App\Models\UnidadeProduto', 'idunidade_produto');
    }

    public function grupo_produto()
    {
        return $this->belongsTo('App\Models\GrupoProduto', 'idgrupo_produto');
    }
}
