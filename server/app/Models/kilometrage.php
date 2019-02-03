<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kilometrage extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'KilometrageInicial','kilometrageFinal',
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