<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Contact;
use Carbon\Carbon;

class ContactController extends Controller
{

    public function store(Request $request)
    {
        // Guardar los datos en la base de datos y redireccionar a la vista
        $validateData = $request->validate([
            'name' => 'nullable|max:255',
            'email' => 'required|email',
            'description' => 'required|max:255',
        ]);

        $contact = new Contact;
        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->description = $request->input('description');
        $contact->save();

        return redirect()->route('home')->with('contact-success', 'Mensaje enviado correctamente');
    }




    public function commentStore(Request $request)
    {
        // Guardar los datos en la base de datos y redireccionar a la vista
        $validateData = $request->validate([
            'name' => 'nullable|max:255',
            'description' => 'required|max:255',
        ]);

        $dc = Carbon::now();
        $date = $dc->format('d/m/Y H:i:s a');

        $comment = new Comment();
        $comment->name = $request->input('username');
        $comment->description = $request->input('description');
        $comment->post_id = $request->input('post_id');
        $comment->datetime_created = $date;
        $comment->save();

        return redirect()->back()->with('comment-success', 'Comentario enviado correctamente');
    }
}
