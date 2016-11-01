<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idcontato',
        'idtipo_telefone',
        'numero'
    ];

    // ******************** RELASHIONSHIP ******************************
    // ************************** belongsTo ****************************
    public function contato()
    {
        return $this->belongsTo('App\Models\Contato', 'idcontato');
    }

    public function tipo_telefone()
    {
        return $this->belongsTo('App\Models\TipoTelefone', 'idtipo_telefone');
    }

}
