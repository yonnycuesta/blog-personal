<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'post_id',
        'portfolio_id',
    ];

    // Relaciones

    /**
     * Obtener la publicación de la etiqueta.
     */

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    /**
     * Obtener el portafolio de la etiqueta.
     */

    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class);
    }
}
