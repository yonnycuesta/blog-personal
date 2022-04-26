<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;

class CategoryEdit extends Component
{
    public Category $category;


    public function mount(Category $category)
    {
        $this->category = $category;
    }

    public function render()
    {
        return view('livewire.admin.category.category-edit')
            ->extends('layouts.app')
            ->section('content');
    }


    protected $rules = [
        'category.name' => 'required|min:3|max:25',
    ];

    protected $messages = [
        'category.name.required' => 'El nombre es requerido',
        'category.name.min' => 'El nombre debe tener al menos 3 caracteres',
        'category.name.max' => 'El nombre debe tener máximo 25 caracteres',
    ];

     // Validación en tiempo real
     public function updated($field)
     {
         $this->validateOnly($field, $this->rules, $this->messages);
     }


    public function update()
    {
        $this->validate( $this->rules, $this->messages );

        $this->category->update([
            'name' => $this->category->name,
        ]);

        $this->dispatchBrowserEvent('toastr-update', [
            'title' => 'Categoria actualizada',
            'type' => 'success',
            'message' => '¡Categoria actualizada éxitosamente!',
            'timer' => 3000,
        ]);
        return redirect()->route('categories');
    }
}
