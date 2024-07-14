<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    //busca um nome diferente na coluna ID do banco de dados
    protected $primaryKey = 'idProperty';

    //Campos para cadastro e atualização de registro no banco de dados
    protected $fillable = [
        'nameProperty',
        'ruralRegistration',
    ];
}
