<?php

namespace App\Models;

use App\Helpers\DataHelper;
use Illuminate\Database\Eloquent\Model;

class Dependente extends Model
{
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idassociado',
        'nome',
        'cpf',
        'rg',
        'genero',
        'telefone'
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

    public function setTelefoneAttribute($value)
    {
        return $this->attributes['telefone'] = DataHelper::getOnlyNumbers($value);
    }

    public function getTelefoneAttribute($value)
    {
        return DataHelper::mask($value, '(##)#####-####');
    }
    // ******************** RELASHIONSHIP ******************************
    // ************************** belongsTo ****************************
    public function associado()
    {
        return $this->belongsTo('App\Models\Associado', 'idassociado');
    }







}
