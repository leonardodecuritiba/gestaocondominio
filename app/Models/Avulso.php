<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Avulso extends Model
{
    static public $associations = [
        'lancamento',
        'lancamento.tipo_lancamento',
        'lancamento.recebimentos',
        'lancamento.recebimentos.conta_bancaria'
    ];
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idlancamento',
        'cancelamento',
        'motivo_cancelamento'
    ];

    static public function complete($id = NULL)
    {
        return ($id != NULL) ? self::where('id', $id)->with(self::$associations)->first() : self::with(self::$associations)->get();
    }
    // ******************** RELASHIONSHIP ******************************
    // ************************** belongsTo ****************************
    public function lancamento()
    {
        return $this->belongsTo('App\Models\Lancamento', 'idlancamento');
    }
}
