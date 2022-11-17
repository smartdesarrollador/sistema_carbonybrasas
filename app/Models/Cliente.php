<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    public function consumos()
    {
        return $this->hasMany('App\Models\Consumo');
    }

    public function pedidos()
    {
        return $this->hasMany('App\Models\Pedido');
    }
}
