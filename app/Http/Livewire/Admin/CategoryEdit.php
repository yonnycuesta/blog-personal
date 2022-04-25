<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;

class CategoryEdit extends Component
{
    public Category $category;


    public function mount(Category $category)
    {
        $this->category = $category;
    }


    protected $rules = [
        'category.name' => 'required|min:3|max:25',
    ];

    protected $messages = [
        'category.name.required' => 'El nombre es requerido',
        'category.name.min' => 'El nombre debe tener al menos 3 caracteres',
        'category.name.max' => 'El nombre debe tener máximo 25 caracteres',
    ];

    public function update()
    {
        $this->validate();

        $this->category->update([
            'name' => $this->category->name,
        ]);

        //$this->emit('categoryUpdated');
        return redirect()->route('categories');
    }


    public function render()
    {
        return view('livewire.admin.category-edit')
            ->extends('layouts.app')
            ->section('content');
    }
}
