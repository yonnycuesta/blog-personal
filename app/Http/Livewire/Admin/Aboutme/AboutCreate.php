<?php

namespace App\Http\Livewire\Admin\Aboutme;

use App\Models\Aboutme;
use Livewire\Component;
use Livewire\WithFileUploads;

class AboutCreate extends Component
{
    use WithFileUploads;

    public $fullname, $email, $phone, $profile, $age, $address, $photo, $designation, $cvs;
    public function render()
    {
        return view('livewire.admin.aboutme.about-create')
            ->extends('layouts.app')
            ->section('content');
    }

    protected $rules = [
        'fullname' => 'required|min:3|max:50',
        'email' => 'required|email|max:50',
        'phone' => 'min:7|max:50|nullable',
        'profile' => 'min:3|nullable',
        'age' => 'required|min:1|max:2',
        'address' => 'min:3|max:50|nullable',
        'designation' => 'min:3|max:50|nullable',
        'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|nullable',
        'cvs' => 'mimes:pdf,svg,|nullable',
    ];

    protected $messages = [
        'fullname.required' => 'El nombre es requerido',
        'fullname.min' => 'El nombre debe tener al menos 3 caracteres',
        'fullname.max' => 'El nombre debe tener máximo 50 caracteres',
        'email.required' => 'El email es requerido',
        'email.email' => 'El email debe ser válido',
        'email.max' => 'El email debe tener máximo 50 caracteres',
        'phone.min' => 'El teléfono debe tener al menos 7 caracteres',
        'phone.max' => 'El teléfono debe tener máximo 50 caracteres',
        'profile.min' => 'El perfil debe tener al menos 3 caracteres',
        'age.required' => 'La edad es requerida',
        'age.min' => 'La edad debe tener al menos 1 caracteres',
        'age.max' => 'La edad debe tener máximo 2 caracteres',
        'address.min' => 'La dirección debe tener al menos 3 caracteres',
        'address.max' => 'La dirección debe tener máximo 50 caracteres',
        'designation.min' => 'La designación debe tener al menos 3 caracteres',
        'designation.max' => 'La designación debe tener máximo 50 caracteres',
        'photo.image' => 'La foto debe ser una imagen',
        'photo.mimes' => 'La foto debe ser una imagen válida',
        'cvs.mimes' => 'El cv debe ser un archivo válido',

    ];

    public function limpiarCampos()
    {
        $this->reset();
    }

    // Validación en tiempo real
    public function updated($field)
    {
        $this->validateOnly($field, $this->rules, $this->messages);
    }

    public function save()
    {
        $validationData = $this->validate();

        $file_save = $this->photo ? 'storage/' . $this->photo->store('aboutme', 'public') : null;
        $cv_save = $this->cvs ? 'storage/' . $this->cvs->store('aboutme', 'public') : null;
        Aboutme::create([
            'photo' => $file_save,
            'cvs' => $cv_save,
        ] + $validationData);

        $this->limpiarCampos();
        //return redirect()->route('aboutme');
    }
}
