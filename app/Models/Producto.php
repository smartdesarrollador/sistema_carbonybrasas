<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    public function TipoProducto()
    {
        return $this->belongsTo('App\Models\TipoProducto');
    }

    public function pedidos()
    {
        return $this->belongsToMany('App\Models\Pedido');
    }
}
