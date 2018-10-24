<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Help extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'phone_number';
    protected $table = 'helps';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'phone_number', 'name', 'latitude', 'longtitude'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'updated_time', 'created_time',
    ];
}
