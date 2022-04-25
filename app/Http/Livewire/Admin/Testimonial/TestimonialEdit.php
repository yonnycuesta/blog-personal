<?php

namespace App\Http\Livewire\Admin\Testimonial;

use App\Models\Testimonial;
use Livewire\Component;

class TestimonialEdit extends Component
{
    public Testimonial $testimonial;

    public function mount(Testimonial $testimonial)
    {
        $this->testimonial = $testimonial;
    }

    public function render()
    {
        return view('livewire.admin.testimonial.testimonial-edit')
            ->extends('layouts.app')
            ->section('content');
    }
    protected $rules = [
        'testimonial.name' => 'required|max:50',
        'testimonial.designation' => 'nullable|max:50',
        'testimonial.description' => 'required|min:10',
    ];

    protected $messages = [
        'testimonial.name.required' => 'El nombre es requerido',
        'testimonial.name.max' => 'El nombre debe tener máximo 50 caracteres',
        'testimonial.designation.max' => 'El cargo profesión debe tener máximo 50 caracteres',
        'testimonial.description.required' => 'La descripción es requerida',
        'testimonial.description.min' => 'La descripción debe tener al menos 10 caracteres',
    ];
    // Validación en tiempo real
    public function updated($field)
    {
        $this->validateOnly($field, $this->rules, $this->messages);
    }

    public function update()
    {
        $this->validate();

        $this->testimonial->update([
            'name' => $this->testimonial->name,
            'designation' => $this->testimonial->designation,
            'description' => $this->testimonial->description,
        ]);

        $this->dispatchBrowserEvent('toastr-update', [
            'title' => 'Testimonio actualizado',
            'message' => '¡Testimonio actualizado éxitosamente!',
            'status' => 'success',
            'timer' => 3000,
        ]);

        return redirect()->route('testimonials.index');
    }
}
