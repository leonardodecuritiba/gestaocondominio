<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lancamento extends Model
{
    static public $associations = [
        'lancamento_avulso',
        'lancamento_pre'
    ];
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idlancamento_avulso',
        'idpre_lancamento',
    ];

    static public function complete($id = NULL)
    {
        return ($id != NULL) ? self::where('id', $id)->with(self::$associations)->first() : self::with(self::$associations)->get();
    }
    // ******************** RELASHIONSHIP ******************************
    // ************************** belongsTo ****************************
    public function lancamento_avulso()
    {
        return $this->belongsTo('App\Models\LancamentoAvulso', 'idlancamento_avulso');
    }

    public function lancamento_pre()
    {
        return $this->belongsTo('App\Models\LancamentoPre', 'idpre_lancamento');
    }
}
