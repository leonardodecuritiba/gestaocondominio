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
        'softdeleted'
    ];

    static public function complete($id = NULL)
    {
        return ($id != NULL) ? self::where('id', $id)->with('imoveis_permanentes')->first() : self::with('imoveis_permanentes')->get();
    }

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

    // ******************** RELASHIONSHIP ******************************
    // ************************** belongsTo ****************************
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

    public function imoveis_permanentes()
    {
        return $this->hasMany('App\Models\ImovelPermanente', 'id_imovel');
    }

    public function pre_lancamentos()
    {
        return $this->hasMany('App\Models\PreLancamento', 'idimovel');
    }
}
