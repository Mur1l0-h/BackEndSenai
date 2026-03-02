<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pedidos extends Model
{

    use HasFactory;

    protected $fillable = ['quantidade', 'valor', 'clientes_id', 'fornecedor_id'];

}
