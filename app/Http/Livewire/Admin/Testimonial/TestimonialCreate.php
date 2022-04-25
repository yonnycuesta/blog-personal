<?php

namespace App\Http\Livewire\Admin\Testimonial;

use App\Models\Testimonial;
use Livewire\Component;

class TestimonialCreate extends Component
{
    public $name, $description, $designation;

    public function render()
    {
        return view('livewire.admin.testimonial.testimonial-create')
            ->extends('layouts.app')
            ->section('content');
    }

    protected $rules = [
        'name' => 'required|max:50',
        'designation' => 'nullable|max:50',
        'description' => 'required|min:10',
    ];

    protected $messages = [
        'name.required' => 'El nombre es requerido',
        'name.max' => 'El nombre debe tener máximo 50 caracteres',
        'designation.max' => 'El cargo profesión debe tener máximo 50 caracteres',
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

        Testimonial::create([
            'name' => $this->name,
            'designation' => $this->designation,
            'description' => $this->description,
        ]);
        $this->limpiarCampos();

        $this->dispatchBrowserEvent('toastr-create', [
            'title' => 'Testimonio creado',
            'message' => '¡Testimonio guardado éxitosamente!',
            'status' => 'success',
            'timer' => 3000,
        ]);
    }
}
