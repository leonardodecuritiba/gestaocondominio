<?php

namespace App\Models;

use App\Helpers\DataHelper;
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


    public function setCpfAttribute($value)
    {
        return $this->attributes['cpf'] = DataHelper::getOnlyNumbers($value);
    }

    public function getCpfAttribute($value)
    {
        return DataHelper::mask($value, '###.###.###-##');
    }

    public function setRgAttribute($value)
    {
        return $this->attributes['rg'] = DataHelper::getOnlyNumbers($value);
    }

    public function getRgAttribute($value)
    {
        return DataHelper::mask($value, '#.###.###-##');
    }

    public function setDataNascimentoAttribute($value)
    {
        return $this->attributes['data_nascimento'] = DataHelper::setDate($value);
    }

    public function getDataNascimentoAttribute($value)
    {
        return DataHelper::getPrettyDate($value);
    }
    // ******************** RELASHIONSHIP ******************************
    // ************************** belongsTo ****************************
    public function ramo_atividade()
    {
        return $this->belongsTo('App\Models\RamoAtividade', 'idramo_atividades');
    }
    public function contato()
    {
        return $this->belongsTo('App\Models\Contato', 'idcontato');
    }
    // ************************** hasOne *******************************

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
