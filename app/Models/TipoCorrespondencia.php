<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoCorrespondencia extends Model
{
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'descricao'
    ];

    // ******************** RELASHIONSHIP ******************************
    // ************************** hasMany ******************************
    public function contatos()
    {
        return $this->hasMany('App\Models\Contato', 'idtipo_correspondencia');
    }
}
