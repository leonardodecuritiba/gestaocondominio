<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RamoAtividade extends Model
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
    public function associados()
    {
        return $this->hasOne('App\Models\Associado', 'idramo_atividade');
    }
}
