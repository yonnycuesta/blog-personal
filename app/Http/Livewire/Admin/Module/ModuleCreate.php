<?php

namespace App\Http\Livewire\Admin\Module;

use App\Models\Module;
use App\Models\Post;
use Livewire\Component;

class ModuleCreate extends Component
{
    // Propiedades publicas
    public $title, $subtitle, $content, $post_id, $posts;

    public function mount()
    {
        $this->posts = Post::all();
    }

    public function render()
    {
        return view('livewire.admin.module.module-create')
            ->extends('layouts.app')
            ->section('content');
    }

    // Propiedades protegidas

    protected $rules = [
        'title' => 'required|min:3|max:150',
        'subtitle' => 'min:3|max:100|nullable',
        'content' => 'required|min:3',
        'post_id' => 'required|numeric',
    ];

    protected $messages = [
        'title.required' => 'El título es requerido',
        'title.min' => 'El título debe tener al menos 3 caracteres',
        'title.max' => 'El título debe tener máximo 150 caracteres',
        'subtitle.min' => 'El subtítulo debe tener al menos 3 caracteres',
        'subtitle.max' => 'El subtítulo debe tener máximo 100 caracteres',
        'content.required' => 'El contenido es requerido',
        'content.min' => 'El contenido debe tener al menos 3 caracteres',
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
        $this->reset('title', 'subtitle', 'content', 'post_id');
    }

    public function store()
    {
        $this->validate($this->rules, $this->messages);

        Module::create([
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'content' => $this->content,
            'post_id' => $this->post_id,
        ]);

        $this->limpiarCampos();

        $this->dispatchBrowserEvent('toastr-create', [
            'title' => 'Módulo creado',
            'message' => '¡Módulo creado éxitosamente!',
            'status' => 'success',
            'timer' => 3000,
        ]);
    }
}
