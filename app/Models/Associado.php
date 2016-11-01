<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Associado extends Model
{
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idramo_atividades',
        'idcontato',
        'nome',
        'cpf',
        'rg',
        'natureza',
        'nome_mae',
        'nome_pai',
        'data_nascimento'
    ];

    // ******************** RELASHIONSHIP ******************************
    // ************************** belongsTo ****************************
    public function ramo_atividade()
    {
        return $this->belongsTo('App\Models\RamoAtividade', 'idramo_atividades');
    }

    // ************************** hasOne *******************************
    public function contato()
    {
        return $this->hasOne('App\Models\Contato', 'idcontato');
    }

    // ************************** hasMany ******************************
    public function inquilinos_imoveis()
    {
        return $this->hasMany('App\Models\Imovel', 'idinquilino');
    }

    public function proprietario_imoveis()
    {
        return $this->hasMany('App\Models\Imovel', 'idproprietario');
    }

    public function dependentes()
    {
        return $this->hasMany('App\Models\Dependente', 'idassociado');
    }

}
