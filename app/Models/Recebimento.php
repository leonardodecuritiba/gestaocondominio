<?php

namespace App\Models;

use App\Helpers\DataHelper;
use Illuminate\Database\Eloquent\Model;

class Recebimento extends Model
{
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idlancamento',
        'idconta_bancaria',
        'idlayout_arquivo',
        'idimovel',
        'idassociado',
        'forma_pagamento',
        'data_agendamento',
        'valor_adicional',
        'descricao_acrescimo',
        'numero_parcelas',
        'valor_abatimento',
        'data_recebimento',
        'numero_comprovante',
        'data_emissao',
        'data_predatado',
        'codigo_banco',
        'agencia',
        'numero_cheque',
        'data_vencimento'
    ];


    public function setDataVencimentoAttribute($value)
    {
        return $this->attributes['data_vencimento'] = DataHelper::setDate($value);
    }

    public function getDataVencimentoAttribute($value)
    {
        return DataHelper::getPrettyDate($value);
    }
    // ******************** RELASHIONSHIP ******************************
    // ************************** belongsTo ****************************
    public function lancamento()
    {
        return $this->belongsTo('App\Models\Lancamento', 'idlancamento');
    }

    public function conta_bancaria()
    {
        return $this->belongsTo('App\Models\ContaBancaria', 'idconta_bancaria');
    }

    public function layout_arquivo()
    {
        return $this->belongsTo('App\Models\LayoutArquivo', 'idlayout_arquivo');
    }

    public function imovel()
    {
        return $this->belongsTo('App\Models\Imovel', 'idimovel');
    }

    public function associado()
    {
        return $this->belongsTo('App\Models\Associado', 'idassociado');
    }
}
