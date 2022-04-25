<?php

namespace App\Http\Livewire\Admin\Module;

use App\Models\Module;
use App\Models\Post;
use Livewire\Component;

class ModuleEdit extends Component
{
    public Module $module;
    public $post_id, $posts;

    public function mount(Module $module)
    {
        $this->module = $module;
        $this->posts = Post::all();
    }

    public function render()
    {
        return view('livewire.admin.module.module-edit')
            ->extends('layouts.app')
            ->section('content');
    }

    // Propiedades protegidas

    protected $rules = [
        'module.title' => 'required|min:3|max:150',
        'module.subtitle' => 'min:3|max:100|nullable',
        'module.content' => 'required|min:3',
        'module.post_id' => 'required|numeric',
    ];

    protected $messages = [
        'module.title.required' => 'El título es requerido',
        'module.title.min' => 'El título debe tener al menos 3 caracteres',
        'module.title.max' => 'El título debe tener máximo 150 caracteres',
        'module.subtitle.min' => 'El subtítulo debe tener al menos 3 caracteres',
        'module.subtitle.max' => 'El subtítulo debe tener máximo 100 caracteres',
        'module.content.required' => 'El contenido es requerido',
        'module.content.min' => 'El contenido debe tener al menos 3 caracteres',
        'module.post_id.required' => 'El post es requerido',
        'module.post_id.numeric' => 'El post debe ser un número',
    ];

    // Validación en tiempo real
    public function updated($field)
    {
        $this->validateOnly($field, $this->rules, $this->messages);
    }


    public function update()
    {
        $this->validate($this->rules, $this->messages);

        $this->module->update([
            'title' => $this->module->title,
            'subtitle' => $this->module->subtitle,
            'content' => $this->module->content,
            'post_id' => $this->module->post_id,
        ]);

        $this->dispatchBrowserEvent('toastr-update', [
            'title' => 'Módulo actualizado',
            'message' => '¡Módulo actualizado éxitosamente!',
            'status' => 'success',
            'timer' => 3000,
        ]);

        return redirect()->route('modules.index');
    }
}
