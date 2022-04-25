<?php

namespace App\Http\Livewire\Admin\Service;

use App\Models\Service;
use Livewire\Component;

class ServiceEdit extends Component
{
    public Service $service;

    public function mount(Service $service)
    {
        $this->service = $service;
    }

    public function render()
    {
        return view('livewire.admin.service.service-edit')
            ->extends('layouts.app')
            ->section('content');
    }

    protected $rules = [
        'service.name' => 'required|max:20',
        'service.icon' => 'nullable|max:20',
        'service.description' => 'required|min:10',
    ];

    protected $messages = [
        'service.name.required' => 'El nombre es requerido',
        'service.name.max' => 'El nombre debe tener máximo 20 caracteres',
        'service.icon.max' => 'El icono debe tener máximo 20 caracteres',
        'service.description.required' => 'La descripción es requerida',
        'service.description.min' => 'La descripción debe tener al menos 10 caracteres',
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

    public function update()
    {
        $this->validate();

        $this->service->update([
            'name' => $this->service->name,
            'description' => $this->service->description,
            'icon' => $this->service->icon,
        ]);

        $this->dispatchBrowserEvent('toastr-update', [
            'title' => 'Servicio actualizado',
            'message' => '¡Servicio actualizado éxitosamente!',
            'status' => 'success',
            'timer' => 3000,
        ]);

        return redirect()->route('services.index');
    }
}
