<?php

namespace App\Http\Livewire\Admin\Award;

use App\Models\Award;
use Livewire\Component;

class AwardEdit extends Component
{
    public Award $award;

    public function mount(Award $award)
    {
        $this->award = $award;
    }

    public function render()
    {
        return view('livewire.admin.award.award-edit')
            ->extends('layouts.app')
            ->section('content');
    }

    protected $rules = [
        'award.title' => 'required|max:50',
        'award.icon' => 'max:20',
        'award.quantity' => 'required|integer|min:1',
    ];

    protected $messages = [
        'award.title.required' => 'El título es requerido',
        'award.title.max' => 'El título debe tener máximo 50 caracteres',
        'award.icon.max' => 'El icono debe tener máximo 20 caracteres',
        'award.quantity.required' => 'La cantidad es requerida',
        'award.quantity.integer' => 'La cantidad debe ser un número entero',
        'award.quantity.min' => 'La cantidad debe ser al menos 1',
    ];


    // Validación en tiempo real
    public function updated($field)
    {
        $this->validateOnly($field, $this->rules, $this->messages);
    }

    public function update()
    {
        $this->validate();

        $this->award->update([
            'title' => $this->award->title,
            'icon' => $this->award->icon,
            'quantity' => $this->award->quantity,
        ]);

        $this->dispatchBrowserEvent('toastr-update', [
            'title' => 'Logro actualizado',
            'type' => 'success',
            'message' => '¡Logro actualizado éxitosamente!',
            'timer' => 3000,
        ]);

        return redirect()->route('awards.index');
    }
}
