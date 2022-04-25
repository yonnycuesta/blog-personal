<?php

namespace App\Http\Livewire\Admin\Post;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;

date_default_timezone_set('America/Bogota');

class PostCreate extends Component
{
    use WithFileUploads;

    public $title, $category_id, $categories, $photo, $description, $datetime_created;

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function render()
    {
        return view('livewire.admin.post.post-create')
            ->extends('layouts.app')
            ->section('content');
    }

    protected $rules = [
        'title' => 'required|min:3|max:100',
        'category_id' => 'required|numeric',
        'description' => 'required|min:3',
        'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|nullable',
    ];

    protected $messages = [
        'title.required' => 'El título es requerido',
        'title.min' => 'El título debe tener al menos 3 caracteres',
        'title.max' => 'El título debe tener máximo 100 caracteres',
        'category_id.required' => 'La categoría es requerida',
        'category_id.numeric' => 'La categoría debe ser un número',
        'description.required' => 'La descripción es requerida',
        'description.min' => 'La descripción debe tener al menos 3 caracteres',
        'photo.image' => 'La imagen debe ser un archivo de imagen',
        'photo.mimes' => 'La imagen debe ser un archivo de tipo: jpeg,png,jpg,gif,svg',
    ];

    public function limpiarCampos()
    {
        $this->reset('title','category_id','description');
    }

    // Validación en tiempo real
    public function updated($field)
    {
        $this->validateOnly($field, $this->rules, $this->messages);
    }

    public function store()
    {
        $this->validate();

        $file_save = $this->photo ? 'storage/' . $this->photo->store('posts', 'public') : null;

        $date_time = date('d/m/Y H:i:sa');

        Post::create([
            'title' => $this->title,
            'description' => $this->description,
            'photo' => $file_save,
            'datetime_created' => $date_time,
            'category_id' => $this->category_id,
        ]);

        $this->limpiarCampos();

        $this->dispatchBrowserEvent('toastr-create', [
            'title' => 'Publicación creada',
            'message' => '¡Publicación guardada éxitosamente!',
            'status' => 'success',
            'timer' => 3000,
        ]);
    }
}
