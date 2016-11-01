<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idtipo_correspondencia',
        'endereco_padrao',
        'cep',
        'estado',
        'cidade',
        'bairro',
        'logradouro',
        'numero',
        'complemento'
    ];
    // ******************** RELASHIONSHIP ******************************
    // ************************** belongsTo ****************************
    public function tipo_correspondencia()
    {
        return $this->belongsTo('App\Models\TipoCorrespondencia', 'idtipo_correspondencia');
    }

    // ************************** hasOne *******************************
    public function associado()
    {
        return $this->hasOne('App\Models\Associado', 'idcontato');
    }

    // ************************** hasMany ******************************
    public function emails()
    {
        return $this->hasOne('App\Models\Email', 'idcontato');
    }

    public function telefones()
    {
        return $this->hasOne('App\Models\Telefone', 'idcontato');
    }
}
