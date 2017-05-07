<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Customer extends Authenticatable
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $guard = 'customers';

    protected $table = 'customers';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['last_name', 'first_name', 'address', 'email', 'request_status', 'password'];
    public $timestamps = false;
    
}
