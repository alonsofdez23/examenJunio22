<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    /**
     * Get all of the lineas for the Producto
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lineas()
    {
        return $this->hasMany(Linea::class);
    }
}
