<?php

namespace App\Http\Livewire\Admin\Aboutme;

use App\Models\Aboutme;
use Livewire\Component;
use Livewire\WithFileUploads;

class AboutEdit extends Component
{
    use WithFileUploads;

    public Aboutme $about;
    public $photo, $cvs;

    public function mount(Aboutme $about)
    {
        $this->about = $about;
    }
    public function render()
    {
        return view('livewire.admin.aboutme.about-edit')
            ->extends('layouts.app')
            ->section('content');
    }

    protected $rules = [
        'about.fullname' => 'required|min:3|max:50',
        'about.email' => 'required|email|max:50',
        'about.phone' => 'min:7|max:50|nullable',
        'about.profile' => 'min:3|nullable',
        'about.age' => 'required|min:1|max:2',
        'about.address' => 'min:3|max:50|nullable',
        'about.designation' => 'min:3|max:50|nullable',
        'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|nullable',
        'cvs' => 'mimes:pdf,svg,|nullable'
    ];

    protected $messages = [
        'about.fullname.required' => 'El nombre es requerido',
        'about.fullname.min' => 'El nombre debe tener al menos 3 caracteres',
        'about.fullname.max' => 'El nombre debe tener máximo 50 caracteres',
        'about.email.required' => 'El email es requerido',
        'about.email.email' => 'El email debe ser válido',
        'about.email.max' => 'El email debe tener máximo 50 caracteres',
        'about.phone.min' => 'El teléfono debe tener al menos 7 caracteres',
        'about.phone.max' => 'El teléfono debe tener máximo 50 caracteres',
        'about.profile.min' => 'El perfil debe tener al menos 3 caracteres',
        'about.age.required' => 'La edad es requerida',
        'about.age.min' => 'La edad debe tener al menos 1 caracteres',
        'about.age.max' => 'La edad debe tener máximo 2 caracteres',
        'about.address.min' => 'La dirección debe tener al menos 3 caracteres',
        'about.address.max' => 'La dirección debe tener máximo 50 caracteres',
        'about.designation.min' => 'La designación debe tener al menos 3 caracteres',
        'about.designation.max' => 'La designación debe tener máximo 50 caracteres',
        'photo.image' => 'La foto debe ser una imagen',
        'photo.mimes' => 'La foto debe ser una imagen válida',
        'cvs.mimes' => 'El CV debe ser un archivo válido',

    ];

    public function update()
    {
        $this->validate();

        $this->about->update([
            'fullname' => $this->about->fullname,
            'age' => $this->about->age,
            'email' => $this->about->email,
            'phone' => $this->about->phone,
            'address' => $this->about->address,
            'photo' => $this->photo ? 'storage/' . $this->photo->store('aboutme', 'public') : $this->about->photo,
            'designation' => $this->about->designation,
            'profile' => $this->about->profile,
            'cvs' => $this->cvs ? 'storage/' . $this->cvs->store('aboutme', 'public') : $this->about->cvs,
        ]);

        return redirect()->route('aboutme.index');
    }
}
