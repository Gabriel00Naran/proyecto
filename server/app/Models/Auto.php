<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auto extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'Placa','Matricula','Tiempo Inicial','Tiempo Final',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
       
    ];

    function Usuario()
    {
       return $this->belongsTo('App\Usuario');
    }

    function TipoAuto()
    {
       return $this->belongsTo('App\TipoAuto');
    }

    function Neumatico()
    {
       return $this->hasOne('App\Neumatico');
    }

    function kilometrages()
    {
       return $this->hasMany('App\kilometrage');
    }

}