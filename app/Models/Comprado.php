<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comprado extends Model
{
    use HasFactory;
    protected $table = "comprados";
    protected $fillable = [
        "id_usuario",
        "id_libro"
    ];
}
