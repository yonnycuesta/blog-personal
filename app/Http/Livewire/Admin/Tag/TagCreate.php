<?php

namespace App\Http\Livewire\Admin\Tag;

use App\Models\Portfolio;
use App\Models\Post;
use App\Models\Tag;
use Livewire\Component;

class TagCreate extends Component
{
    public $name, $post_id, $portfolio_id, $posts, $portfolios;

    public function mount()
    {
        $this->posts = Post::all();
        $this->portfolios = Portfolio::all();
    }

    public function render()
    {
        return view('livewire.admin.tag.tag-create')
            ->extends('layouts.app')
            ->section('content');
    }

    protected $rules = [
        'name' => 'required|min:3|max:50|unique:tags',
        'post_id' => 'numeric|nullable',
        'portfolio_id' => 'numeric|nullable',
    ];

    protected $messages = [
        'name.required' => 'El nombre es requerido',
        'name.min' => 'El nombre debe tener al menos 3 caracteres',
        'name.max' => 'El nombre debe tener máximo 50 caracteres',
        'name.unique' => 'El nombre ya existe',
        'post_id.numeric' => 'El post debe ser un número',
        'portfolio_id.numeric' => 'El portfolio debe ser un número',
    ];
     // Validación en tiempo real
     public function updated($field)
     {
         $this->validateOnly($field, $this->rules, $this->messages);
     }
     

    public function limpiarCampos()
    {
        $this->reset('name', 'post_id', 'portfolio_id');
    }

    public function store()
    {
        $this->validate($this->rules, $this->messages);

        Tag::create([
            'name' => $this->name,
            'post_id' => $this->post_id,
            'portfolio_id' => $this->portfolio_id,
        ]);

        $this->limpiarCampos();

        $this->dispatchBrowserEvent('toastr-create', [
            'title' => 'Etiqueta creada',
            'message' => '¡Etiqueta guardada éxitosamente!',
            'status' => 'success',
            'timer' => 3000,
        ]);
    }
}
