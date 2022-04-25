<?php

namespace App\Http\Livewire\Admin\Post;

use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

// Hora local
date_default_timezone_set('America/Bogota');

class PostEdit extends Component
{
    use WithFileUploads;

    public Post $post;
    public $photo, $categories;

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->categories = Category::all();
    }

    public function render()
    {
        return view('livewire.admin.post.post-edit')
            ->extends('layouts.app')
            ->section('content');
    }

    protected $rules = [
        'post.title' => 'required|min:3|max:100',
        'post.category_id' => 'required|numeric',
        'post.description' => 'required|min:3',
        'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|nullable',
    ];

    protected $messages = [
        'post.title.required' => 'El título es requerido',
        'post.title.min' => 'El título debe tener al menos 3 caracteres',
        'post.title.max' => 'El título debe tener máximo 100 caracteres',
        'post.category_id.required' => 'La categoría es requerida',
        'post.category_id.numeric' => 'La categoría debe ser un número',
        'post.description.required' => 'La descripción es requerida',
        'post.description.min' => 'La descripción debe tener al menos 3 caracteres',
        'photo.image' => 'La imagen debe ser un archivo de imagen',
        'photo.mimes' => 'La imagen debe ser un archivo de tipo: jpeg,png,jpg,gif,svg',
    ];


    // Validación en tiempo real
    public function updated($field)
    {
        $this->validateOnly($field, $this->rules, $this->messages);
    }


    public function update()
    {
        $this->validate($this->rules, $this->messages);
        $date_time = Carbon::now()->format('d/m/Y H:i:sa');

        $this->post->update([
            'title' => $this->post->title,
            'description' => $this->post->description,
            'photo' => $this->photo ? 'storage/' . $this->photo->store('posts', 'public') : $this->post->photo,
            'category_id' => $this->post->category_id,
            'datetime_created' => $date_time,

        ]);

        $this->dispatchBrowserEvent('toastr-update', [
            'title' => 'Publicación actualizada',
            'message' => '¡Publicación actualizada éxitosamente!',
            'status' => 'success',
            'timer' => 3000,
        ]);

        return redirect()->route('posts.index');
    }
}
