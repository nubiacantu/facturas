<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emisora extends Model
{
    use HasFactory;
    protected $fillable = [
        'razon',
        'rfc',
        'email',
    ];
}
