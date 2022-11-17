<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consumo extends Model
{
    use HasFactory;

    protected $table = 'consumo';

    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente');
    }
}
