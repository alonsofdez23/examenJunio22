<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $table = 'tickets';

    protected $fillable = [
        'tarjeta',
    ];

    /**
     * Get all of the lineas for the Ticket
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lineas()
    {
        return $this->hasMany(Linea::class);
    }
}
