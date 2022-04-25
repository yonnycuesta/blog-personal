<?php

namespace App\Http\Livewire\Admin\Award;

use App\Models\Award;
use Livewire\Component;

class AwardCreate extends Component
{
    public $title, $icon, $quantity;

    public function render()
    {
        return view('livewire.admin.award.award-create')
            ->extends('layouts.app')
            ->section('content');
    }

    protected $rules = [
        'title' => 'required|max:50',
        'icon' => 'nullable|max:20',
        'quantity' => 'required|integer|min:1',
    ];

    protected $messages = [
        'title.required' => 'El título es requerido',
        'title.max' => 'El título debe tener máximo 50 caracteres',
        'icon.max' => 'El icono debe tener máximo 20 caracteres',
        'quantity.required' => 'La cantidad es requerida',
        'quantity.integer' => 'La cantidad debe ser un número entero',
        'quantity.min' => 'La cantidad debe ser al menos 1',
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

        Award::create([
            'title' => $this->title,
            'icon' => $this->icon,
            'quantity' => $this->quantity,
        ]);
        $this->limpiarCampos();

        $this->dispatchBrowserEvent('toastr-create', [
            'title' => 'Logro creado',
            'message' => '¡Logro guardado éxitosamente!',
            'status' => 'success',
            'timer' => 3000,

        ]);
    }
}
