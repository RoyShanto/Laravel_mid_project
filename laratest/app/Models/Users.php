<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';


    protected $primarykey = 'u_id';


    public $timestamps = false;
    // const CREATED_AT = null;
    // const UPDATED_AT = null;
}
