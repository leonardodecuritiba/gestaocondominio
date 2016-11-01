<?php

namespace App\Models;

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
    // ******************** RELASHIONSHIP ******************************
    // ************************** belongsTo ****************************
    public function associado()
    {
        return $this->belongsTo('App\Models\Associado', 'idassociado');
    }







}
