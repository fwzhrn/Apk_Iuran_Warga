<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dues_category extends Model
{
    protected $fillable = [
        'period',
        'nominal',
        'status'
    ];
}
