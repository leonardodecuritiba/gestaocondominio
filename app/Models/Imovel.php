<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imovel extends Model
{
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idproprietario',
        'idinquilino',
        'idlocalidade',
        'idsituacao_imovel',
        'cep',
        'quadra',
        'lote',
        'logradouro',
        'obs',
        'status',
        'area_imovel',
        'area_construida',
        'area_ajardinada',
        'data_mudanca'
    ];

    // ******************** RELASHIONSHIP ******************************
    // ************************** belongsTo ****************************
    public function proprietario()
    {
        return $this->belongsTo('App\Models\Associado', 'idproprietario');
    }

    public function inquilino()
    {
        return $this->belongsTo('App\Models\Associado', 'idinquilino');
    }

    public function localidade()
    {
        return $this->belongsTo('App\Models\Localidade', 'idlocalidade');
    }

    public function situacao_imovel()
    {
        return $this->belongsTo('App\Models\SituacaoImovel', 'idsituacao_imovel');
    }

    // ************************** hasMany ******************************
    public function areas_externas()
    {
        return $this->hasOne('App\Models\AreaExterna', 'idtipo_area_externa');
    }


}
