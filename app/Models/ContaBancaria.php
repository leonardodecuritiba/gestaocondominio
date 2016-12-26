<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContaBancaria extends Model
{
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idbanco',
        'agencia',
        'conta',
        'tipo',
        'operacao',
        'relatorio',
        'saldo'
    ];
    // ******************** RELASHIONSHIP ******************************
    // ************************** belongsTo ****************************
    public function grupo_lancamento()
    {
        return $this->belongsTo('App\Models\Banco', 'idbanco');
    }

    // ************************** hasMany ****************************
    public function transferencia_recebidas()
    {
        return $this->hasMany('App\Models\Transferencias', 'iddepositario');
    }

    public function transferencia_enviadas()
    {
        return $this->hasMany('App\Models\Transferencias', 'iddepositante');
    }

    public function movimentacoes_recebidas()
    {
        return $this->hasMany('App\Models\Movimentacao', 'iddepositario');
    }

    public function movimentacoes_enviadas()
    {
        return $this->hasMany('App\Models\Movimentacao', 'iddepositante');
    }
}
