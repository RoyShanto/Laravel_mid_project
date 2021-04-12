<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'p_id';
    protected $table = 'product';
    public $incrementing = false;
    public $timestamps = false;


    
    function getbestsellingproduct(){
        return $this->hasMany('App\Models\Order');
    }
}
