<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'photo',
        'datetime_created',
        'category_id',
    ];

    // Relación

    /**
     * Obtener la categoría del post.
     */

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Obtener las etiquetas del post.
     */

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }

    /**
     * Obtener los recursos del post.
     */

    public function resources()
    {
        return $this->hasMany(Resource::class);
    }

    /**
     * Obtener los modulos del post.
     */

    public function modules()
    {
        return $this->hasMany(Module::class);
    }

    /**
     * Obtener las galerias del post.
     */

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }

    /**
     * Obtener los comentarios del post.
     */

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
