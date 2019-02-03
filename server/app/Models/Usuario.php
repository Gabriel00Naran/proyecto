<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'NombreWeb',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
       
    ];

    function Autos()
    {
       return $this->hasMany('App\Auto');
    }

    function Persona()
    {
       return $this->hasOne('App\Persona');
    }

}