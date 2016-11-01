<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AreaExterna extends Model
{
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idtipo_area_externa',
        'idimovel',
        'quantidade',
        'area_construida'
    ];

    // ******************** RELASHIONSHIP ******************************
    // ************************** belongsTo ****************************
    public function tipo_area_externa()
    {
        return $this->belongsTo('App\Models\TipoAreaExterna', 'idtipo_area_externa');
    }

    public function imovel()
    {
        return $this->belongsTo('App\Models\Imovel', 'idimovel');
    }


}
