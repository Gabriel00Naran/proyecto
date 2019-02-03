<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoAuto extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'Tipo',
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
       return $this->hasOne('App\Auto');
    }

}