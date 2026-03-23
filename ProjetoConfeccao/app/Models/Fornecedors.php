<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fornecedors extends Model
{

    use HasFactory;

    protected $fillable = ['nome', 'endereco', 'telefone'];
}
