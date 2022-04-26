<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;

class CategoryCreate extends Component
{
    public $name;

    public function render()
    {
        return view('livewire.admin.category.category-create')
            ->extends('layouts.app')
            ->section('content');
    }

    protected $rules = [
        'name' => 'required|min:3|max:25|unique:categories',
    ];

    protected $messages = [
        'name.required' => 'El nombre es requerido',
        'name.min' => 'El nombre debe tener al menos 3 caracteres',
        'name.max' => 'El nombre debe tener máximo 25 caracteres',
        'name.unique' => 'El nombre ya existe',
    ];
    // Limpiar el formulario

    public function limpiarCampos()
    {
        $this->reset();
    }
    // Validación en tiempo real
    public function updated($field)
    {
        $this->validateOnly($field, $this->rules, $this->messages);
    }

    public function store()
    {
        $this->validate();

        Category::create([
            'name' => $this->name,
        ]);

        $this->limpiarCampos();

        $this->dispatchBrowserEvent('toastr-create', [
            'title' => 'Categoria creada',
            'type' => 'success',
            'message' => 'Categoria creada éxitosamente',
            'timer' => 3000,
        ]);
    }
}
