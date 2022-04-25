<?php

namespace App\Http\Livewire\Admin\Service;

use App\Models\Service;
use Livewire\Component;

class ServiceCreate extends Component
{
    public $name, $description, $icon;

    public function render()
    {
        return view('livewire.admin.service.service-create')
            ->extends('layouts.app')
            ->section('content');
    }

    protected $rules = [
        'name' => 'required|max:20',
        'icon' => 'nullable|max:20',
        'description' => 'required|min:10',
    ];

    protected $messages = [
        'name.required' => 'El nombre es requerido',
        'name.max' => 'El nombre debe tener máximo 20 caracteres',
        'icon.max' => 'El icono debe tener máximo 20 caracteres',
        'description.required' => 'La descripción es requerida',
        'description.min' => 'La descripción debe tener al menos 10 caracteres',
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

        Service::create([
            'name' => $this->name,
            'description' => $this->description,
            'icon' => $this->icon,
        ]);
        $this->limpiarCampos();

        $this->dispatchBrowserEvent('toastr-create', [
            'title' => 'Servicio creado',
            'message' => '¡Servicio guardado éxitosamente!',
            'status' => 'success',
            'timer' => 3000,
        ]);
    }
}
