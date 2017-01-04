<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PreLancamento extends Model
{
    static public $associations = [
        'imovel',
        'tipo_lancamento'
    ];
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idimovel',
        'idtipo_lancamento',
        'descricao',
        'valor',
        'observacao',
        'valor_desconto',
        'descricao_desconto'
    ];

    static public function complete($id = NULL)
    {
        return ($id != NULL) ? self::where('id', $id)->with(self::$associations)->first() : self::with(self::$associations)->get();
    }
    // ******************** RELASHIONSHIP ******************************
    // ************************** belongsTo ****************************
    public function imovel()
    {
        return $this->belongsTo('App\Models\Imovel', 'idimovel');
    }

    public function tipo_lancamento()
    {
        return $this->belongsTo('App\Models\TipoLancamento', 'idtipo_lancamento');
    }
}
