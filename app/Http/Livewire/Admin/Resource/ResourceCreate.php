<?php

namespace App\Http\Livewire\Admin\Resource;

use App\Models\Post;
use App\Models\Resource;
use Livewire\Component;

class ResourceCreate extends Component
{
    public $name, $url, $post_id, $posts;

    public function mount()
    {
        $this->posts = Post::all();
    }


    public function render()
    {
        return view('livewire.admin.resource.resource-create')
            ->extends('layouts.app')
            ->section('content');
    }

    protected $rules = [
        'name' => 'required|min:3|max:20',
        'url' => 'required|min:3',
        'post_id' => 'numeric|nullable',
    ];

    protected $messages = [
        'name.required' => 'El nombre es requerido',
        'name.min' => 'El nombre debe tener al menos 3 caracteres',
        'name.max' => 'El nombre debe tener máximo 20 caracteres',
        'url.required' => 'La url es requerida',
        'url.min' => 'La url debe tener al menos 3 caracteres',
        'post_id.numeric' => 'El post debe ser un número',
    ];

    // Validación en tiempo real
    public function updated($field)
    {
        $this->validateOnly($field, $this->rules, $this->messages);
    }

    public function limpiarCampos()
    {
        $this->reset('name', 'url', 'post_id');
    }

    public function store()
    {
        $this->validate($this->rules, $this->messages);

        Resource::create([
            'name' => $this->name,
            'url' => $this->url,
            'post_id' => $this->post_id,
        ]);

        $this->limpiarCampos();

        $this->dispatchBrowserEvent('toastr-create', [
            'title' => 'Recurso creado',
            'message' => '¡Recurso creado éxitosamente!',
            'status' => 'success',
            'timer' => 3000,
        ]);
    }
}
