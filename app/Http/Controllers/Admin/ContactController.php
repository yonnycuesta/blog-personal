<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

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

        Session()->flash('contact_added', '¡Mensaje enviado correctamente!');

        return redirect()->route('home');
    }
}
