<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fornecedor extends Model
{

    use HasFactory;

    protected $fillable = ['nome', 'endereco', 'telefone'];
}
