<?php

namespace App\Models;

use App\Helpers\DataHelper;
use Illuminate\Database\Eloquent\Model;

class LancamentoRecorrente extends Model
{
    static public $associations = [
        'localidade',
        'tipo_lancamento'
    ];
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idlocalidade',
        'idtipo_lancamento',
        'valor',
        'tipo_associacao',
        'data_expiracao',
        'fixo'
    ];

    static public function complete($id = NULL)
    {
        return ($id != NULL) ? self::where('id', $id)->with(self::$associations)->first() : self::with(self::$associations)->get();
    }

    public function setDataExpiracaoAttribute($value)
    {
        return $this->attributes['data_expiracao'] = DataHelper::setDate($value);
    }

    public function getDataExpiracaoAttribute($value)
    {
        return DataHelper::getPrettyDate($value);
    }

    // ******************** RELASHIONSHIP ******************************
    // ************************** belongsTo ****************************
    public function tipo_lancamento()
    {
        return $this->belongsTo('App\Models\TipoLancamento', 'idtipo_lancamento');
    }

    public function localidade()
    {
        return $this->belongsTo('App\Models\Localidade', 'idlocalidade');
    }
}
