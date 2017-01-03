<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Avulso extends Model
{
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
    // ******************** RELASHIONSHIP ******************************
    // ************************** belongsTo ****************************
    public function lancamento()
    {
        return $this->belongsTo('App\Models\Lancamento', 'idlancamento');
    }
}
