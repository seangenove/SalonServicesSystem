<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'visits';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'visitId';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['description', 'scheduled_date', 'transactionId', 'status'];

    
}
