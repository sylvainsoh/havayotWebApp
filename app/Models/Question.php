<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'question';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';
    public $incrementing = true;


    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'label',
                  'answer',
                  'options'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

}
