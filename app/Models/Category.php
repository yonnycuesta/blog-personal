<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Relación

    /**
     * Obtener los posts de la categoría.
     */

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Obtener los portafolios de la categoría.
     */

    public function portfolios()
    {
        return $this->hasMany(Portfolio::class);
    }
}
