<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;

class Payment extends Model
{
    //
    use HasFactory;

    protected $fillable = ['name', 'amount', 'payment_method'];
}
