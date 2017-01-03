<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pre extends Model
{
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idlancamento',
        'valor_desconto',
        'descricao_desconto'
    ];
    // ******************** RELASHIONSHIP ******************************
    // ************************** belongsTo ****************************
    public function lancamento()
    {
        return $this->belongsTo('App\Models\Lancamento', 'idlancamento');
    }
}
