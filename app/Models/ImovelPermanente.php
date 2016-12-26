<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImovelPermanente extends Model
{
    public $timestamps = true;
    protected $table = 'imovel_permanente';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_pessoa',
        'id_imovel',
        'data_mudanca',
        'tipo',
        'softdeleted'
    ];

    public function setDataMudancaAttribute($value)
    {
        return $this->attributes['data_mudanca'] = DataHelper::setDate($value);
    }

    public function getDataMudancaAttribute($value)
    {
        return DataHelper::getPrettyDate($value);
    }

    // ******************** RELASHIONSHIP ******************************
    // ************************** belongsTo ****************************
    public function pessoa()
    {
        return $this->belongsTo('App\Models\Associado', 'id_pessoa');
    }


    public function imovel()
    {
        return $this->belongsTo('App\Models\Imovel', 'idimovel');
    }
}
