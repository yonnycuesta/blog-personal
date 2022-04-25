<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'content',
        'post_id',
    ];

    // Relaciones

    /**
     * Obtener el post del módulo.
     */

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
