<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'url',
        'post_id',
    ];

    // Relaciones

    /**
     * Obtener el post del recurso.
     */

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
