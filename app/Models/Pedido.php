<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $table = 'pedidos';

    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente');
    }

    public function estadopedido()
    {
        return $this->belongsTo('App\Models\Estadopedido');
    }

    public function feedbacks()
    {
        return $this->hasMany('App\Models\Feedback');
    }

    public function productos()
    {
        return $this->belongsToMany('App\Models\Producto');
    }
}
