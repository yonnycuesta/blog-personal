<?php

namespace App\Http\Livewire\Admin\Gallery;

use App\Models\Gallery;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;

class GalleryCreate extends Component
{
    use WithFileUploads;

    // Propiedades publicas
    public $post_id, $posts;

    public $photos = [];


    public function mount()
    {
        $this->posts = Post::all();
    }

    public function render()
    {
        return view('livewire.admin.gallery.gallery-create')
            ->extends('layouts.app')
            ->section('content');
    }

    // Propiedades protegidas

    protected $rules = [
        'photos.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        'post_id' => 'required|numeric',
    ];

    protected $messages = [
        'photos.required' => 'La imagen es requerida',
        'photos.image' => 'La imagen debe ser un archivo de imagen',
        'photos.mimes' => 'La imagen debe ser un archivo de imagen',
        'post_id.required' => 'El post es requerido',
        'post_id.numeric' => 'El post debe ser un número',
    ];

    // Validación en tiempo real
    public function updated($field)
    {
        $this->validateOnly($field, $this->rules, $this->messages);
    }

    // Función para limpiar los campos
    public function limpiarCampos()
    {
        $this->reset('photos', 'post_id');
    }

    public function store()
    {
        $this->validate();

        foreach ($this->photos as $key => $photo) {

            $file_save =  'storage/' . $photo->store('galleries', 'public');

            Gallery::create([
                'photo' => $file_save,
                'post_id' => $this->post_id,
            ]);
        }

        $this->dispatchBrowserEvent('toastr-create', [
            'title' => 'Registro creado',
            'message' => '¡Registro creado éxitosamente!',
            'status' => 'success',
            'timer' => 3000,
        ]);

        return redirect()->route('galleries.index');
    }
}
