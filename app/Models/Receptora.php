<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receptora extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'direccion',
        'rfc',
        'contacto',
        'email',
    ];
}
