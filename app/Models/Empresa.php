<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;
    protected $primaryKey = "idEmpresa";
    public $timestamps = false;
    public function usuario(){
        return $this->belongsToMany(User::class,'uempresas','empresa_id','user_id');
    }
}
