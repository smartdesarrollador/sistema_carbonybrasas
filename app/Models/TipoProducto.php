<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoProducto extends Model
{
    use HasFactory;

    protected $table = 'tipoproducto';

    protected $fillable = ['idTipoProducto', 'nombre', 'imageUrl'];

    protected $guarded = ['idTipoProducto'];

    protected $primaryKey = 'idTipoProducto';

    public function productos()
    {
        return $this->hasMany('App\Models\Producto');
    }
}
