<?php

namespace App\Models;

use App\Helpers\DataHelper;
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


    public function getAreaImovelAttribute($value)
    {
        return DataHelper::getFloat2Real($value);
    }

    public function setAreaImovelAttribute($value)
    {
        return $this->attributes['area_imovel'] = DataHelper::getReal2Float($value);
    }

    public function getAreaConstruidaAttribute($value)
    {
        return DataHelper::getFloat2Real($value);
    }

    public function setAreaConstruidaAttribute($value)
    {
        return $this->attributes['area_construida'] = DataHelper::getReal2Float($value);
    }

    public function getAreaAjardinadaAttribute($value)
    {
        return DataHelper::getFloat2Real($value);
    }

    public function setAreaAjardinadaAttribute($value)
    {
        return $this->attributes['area_ajardinada'] = DataHelper::getReal2Float($value);
    }

    public function setDataMudancaAttribute($value)
    {
        return $this->attributes['data_mudanca'] = DataHelper::setDate($value);
    }

    public function getDataMudancaAttribute($value)
    {
        return DataHelper::getPrettyDate($value);
    }
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
        return $this->hasMany('App\Models\AreaExterna', 'idimovel');
    }

    public function documentos()
    {
        return $this->hasMany('App\Models\AreaExterna', 'idimovel');
    }


}