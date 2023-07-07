<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;
    protected $fillable = [
        'folio',
        'pdf',
        'xml',
        'emisora_id',
        'receptora_id'
    ];

    //relacion de id con empresa emisora
    public function emisora(){
        return $this->belongsTo(Emisora::class,'emisora_id');
    }
    //relacion de id con empresa receptora
    public function receptora(){
        return $this->belongsTo(Receptora::class,'receptora_id');
    }

    
}
