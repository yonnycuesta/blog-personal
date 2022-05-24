<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'datetime_created',
        'post_id',
    ];

    // Relación

    /**
     * Obtener el post del comentario.
     */

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

}
