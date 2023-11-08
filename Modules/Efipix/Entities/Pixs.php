<?php

namespace Modules\Efipix\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pixs extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome_pagante',
        'cpf_pagante', 
        'nome_recebedor', 
        'tipo', 
        'chave',
        'valor',
        'status'];

    protected static function newFactory()
    {
        return \Modules\Efipix\Database\factories\PixsFactory::new();
    }
}
