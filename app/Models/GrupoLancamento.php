<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GrupoLancamento extends Model
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
    // ************************** belongsTo ****************************
    public function tipo_lancamentos()
    {
        return $this->hasMany('App\Models\TipoLancamento', 'idgrupo_lancamento');
    }
}
