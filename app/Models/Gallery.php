<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo',
        'post_id',
    ];

    // Relación

    /**
     * Obtener el post de la galería.
     */

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
