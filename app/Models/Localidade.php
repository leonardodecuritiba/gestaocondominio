<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Localidade extends Model
{
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'descricao',
        'softdeleted'
    ];

    // ******************** RELASHIONSHIP ******************************
    // ************************** hasOne *******************************
    public function imovel()
    {
        return $this->hasOne('App\Models\Imovel', 'idlocalidade');
    }
}
