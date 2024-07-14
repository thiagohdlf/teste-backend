<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producer extends Model
{
    use HasFactory;

    //Campos para cadastro e atualização de registro no banco de dados
    protected $fillable = [
        'nameProducer',
        'cpfProducer',
    ];
}
