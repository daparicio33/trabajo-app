<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function postulante(){
        return $this->belongsTo(AdmisionePostulante::class,'admisione_postulante_id');
    }
    
}
