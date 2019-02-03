<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'Nombres','Apellidos','Telefono','Direccion ','Identificacion ',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
       'Password',
    ];

    function Usuario()
    {
       return $this->belongsTo('App\Usuario');
    }

}