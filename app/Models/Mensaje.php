<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['id', 'mensaje', 'nombre', 'edad'];
}
