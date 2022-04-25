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
}
