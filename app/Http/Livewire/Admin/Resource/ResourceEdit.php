<?php

namespace App\Http\Livewire\Admin\Resource;

use App\Models\Post;
use App\Models\Resource;
use Livewire\Component;

class ResourceEdit extends Component
{
    public $posts;
    public Resource $resource;

    public function mount(Resource $resource)
    {
        $this->resource = $resource;
        $this->posts = Post::all();
    }

    public function render()
    {
        return view('livewire.admin.resource.resource-edit')
            ->extends('layouts.app')
            ->section('content');
    }

    protected $rules = [
        'resource.name' => 'required|min:3|max:20',
        'resource.url' => 'required|min:3',
        'resource.post_id' => 'numeric|nullable',
    ];

    protected $messages = [
        'resource.name.required' => 'El nombre es requerido',
        'resource.name.min' => 'El nombre debe tener al menos 3 caracteres',
        'resource.name.max' => 'El nombre debe tener máximo 20 caracteres',
        'resource.url.required' => 'La url es requerida',
        'resource.url.min' => 'La url debe tener al menos 3 caracteres',
        'resource.post_id.numeric' => 'El post debe ser un número',
    ];

    // Validación en tiempo real
    public function updated($field)
    {
        $this->validateOnly($field, $this->rules, $this->messages);
    }

    public function update()
    {
        $this->validate($this->rules, $this->messages);

        $this->resource->update([
            'name' => $this->resource->name,
            'url' => $this->resource->url,
            'post_id' => $this->resource->post_id,
        ]);

        $this->dispatchBrowserEvent('toastr-update', [
            'title' => 'Recurso actualizado',
            'message' => '¡Recurso actualizado éxitosamente!',
            'status' => 'success',
            'timer' => 3000,
        ]);

        return redirect()->route('resources.index');
    }
}
