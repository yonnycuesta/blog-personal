<?php

namespace App\Http\Livewire\Admin\Gallery;

use App\Models\Gallery;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;

class GalleryEdit extends Component
{
    use WithFileUploads;

    // Propiedades publicas
    public Gallery $gallery;
    public  $post_id, $posts, $photo;

    public function mount(Gallery $gallery)
    {
        $this->gallery = $gallery;
        $this->posts = Post::all();
    }

    public function render()
    {
        return view('livewire.admin.gallery.gallery-edit')
            ->extends('layouts.app')
            ->section('content');
    }

    // Propiedades protegidas

    protected $rules = [
        'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|nullable',
        'gallery.post_id' => 'required|numeric',
    ];

    protected $messages = [
        'photo.image' => 'La imagen debe ser un archivo de imagen',
        'photo.mimes' => 'La imagen debe ser un archivo de tipo: jpeg,png,jpg,gif,svg',
        'gallery.post_id.required' => 'El post es requerido',
        'gallery.post_id.numeric' => 'El post debe ser un número',
    ];

    // Validación en tiempo real
    public function updated($field)
    {
        $this->validateOnly($field, $this->rules, $this->messages);
    }

    public function update()
    {
        $this->validate($this->rules, $this->messages);

        $this->gallery->update([
            'photo' => $this->photo ? 'storage/' . $this->photo->store('galleries', 'public') : $this->gallery->photo,
            'post_id' => $this->gallery->post_id,
        ]);

        $this->dispatchBrowserEvent('toastr-update', [
            'title' => 'Imágen actualizada',
            'message' => '¡Imágen actualizada éxitosamente!',
            'status' => 'success',
            'timer' => 3000,
        ]);

        return redirect()->route('galleries.index');
    }
}
