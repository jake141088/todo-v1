<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListaDeTarefas extends Model
{
    use HasFactory;

    protected $fillable = [
        'texto',
        'autor',
        'status',
    ];
}
