<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Neumatico extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'Ancho','Carga','velocidad','Ring','Perfil','TipoNeumatico',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
       
    ];

    function Auto()
    {
       return $this->belongsTo('App\Auto');
    }

}