<?php

namespace App\Models;

use App\Helpers\DataHelper;
use Illuminate\Database\Eloquent\Model;

class LancamentoAvulso extends Model
{
    static public $associations = [
        'conta_bancaria',
        'layout_arquivo',
        'imovel',
        'tipo_lancamento',
        'lancamento'
    ];
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idconta_bancaria',
        'idlayout_arquivo',
        'idimovel',
        'idtipo_lancamento',
        'descricao',
        'valor',
        'data_vencimento',
        'observacao',
        'cancelamento',
        'motivo_cancelamento'
    ];

    static public function complete($id = NULL)
    {
        return ($id != NULL) ? self::where('id', $id)->with(self::$associations)->first() : self::with(self::$associations)->get();
    }

    public function getValorAttribute($value)
    {
        return DataHelper::getFloat2Real($value);
    }

    public function setValorAttribute($value)
    {
        return $this->attributes['valor'] = DataHelper::getReal2Float($value);
    }

    public function setDataVencimentoAttribute($value)
    {
        return $this->attributes['data_vencimento'] = DataHelper::setDate($value);
    }

    public function getDataVencimentoAttribute($value)
    {
        return DataHelper::getPrettyDate($value);
    }
    // ******************** RELASHIONSHIP ******************************
    // ************************** belongsTo ****************************

    public function conta_bancaria()
    {
        return $this->belongsTo('App\Models\ContaBancaria', 'idconta_bancaria');
    }

    public function layout_arquivo()
    {
        return $this->belongsTo('App\Models\LayoutArquivo', 'idlayout_arquivo');
    }

    public function imovel()
    {
        return $this->belongsTo('App\Models\Imovel', 'idimovel');
    }

    public function tipo_lancamento()
    {
        return $this->belongsTo('App\Models\TipoLancamento', 'idtipo_lancamento');
    }

    // ************************** hasOne ****************************
    public function lancamento()
    {
        return $this->hasOne('App\Models\Lancamento', 'idlancamento_avulso');
    }
}
