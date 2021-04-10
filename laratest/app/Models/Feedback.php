<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'user_feedback';
    public $incrementing = false;
    public $timestamps = false;
}
