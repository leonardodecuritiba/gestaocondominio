<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lancamento extends Model
{
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idtipo_lancamento',
        'descricao',
        'valor',
        'data_vencimento',
        'tipo',
        'observacao'
    ];

    // ******************** RELASHIONSHIP ******************************
    // ************************** belongsTo ****************************
    public function tipo_lancamento()
    {
        return $this->belongsTo('App\Models\TipoLancamento', 'idtipo_lancamento');
    }

    // ************************** hasOne ****************************
    public function recorrente()
    {
        return $this->hasOne('App\Models\Recorrente', 'idlancamento');
    }

    public function avulso()
    {
        return $this->hasOne('App\Models\Avulso', 'idlancamento');
    }

    public function pre()
    {
        return $this->hasOne('App\Models\Pre', 'idlancamento');
    }

    // ************************** hasMany ****************************
    public function recebimentos()
    {
        return $this->hasMany('App\Models\Recebimento', 'idlancamento');
    }
}




