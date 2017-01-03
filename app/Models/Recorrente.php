<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recorrente extends Model
{
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idlancamento',
        'idlocalidade',
        'tipo',
        'valor_desconto',
        'descricao_desconto'
    ];

    // ******************** RELASHIONSHIP ******************************
    // ************************** belongsTo ****************************
    public function lancamento()
    {
        return $this->belongsTo('App\Models\Lancamento', 'idlancamento');
    }

    public function localidade()
    {
        return $this->belongsTo('App\Models\Localidade', 'idlocalidade');
    }
}
