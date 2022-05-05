<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function store(Request $request)
    {
        // Guardar el comentario hecho a un post es específico
        $validateData = $request->validate([
            'name' => 'nullable|max:255',
            'description' => 'required|max:255',
            'post_id' => 'required|integer',

        ]);
        $date_created = Carbon::now()->format('d/m/Y H:i:sa');

        Comment::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'post_id' => $request->input('post_id'),
            'datetime_create' => $date_created,
        ]);

        Session()->flash('comment_added', '¡Comentario agregado correctamente!');

        return redirect()->back();
    }
}
