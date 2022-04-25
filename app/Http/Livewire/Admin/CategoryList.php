<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryList extends Component
{
    // Librerias
    use WithPagination;

    // Propiedades publicas
    public $search;

    // Propiedades privadas y protegidas
    private $perPage = 5;
    protected $paginationTheme = 'bootstrap';


    // Listener
    protected $listeners = [
        'delete',
    ];

    // Metodos
    public function render()
    {

        return view('livewire.admin.category-list', [
            'categories' => Category::when($this->search, function ($query, $search) {
                return $query->where('name', 'like', '%' . $this->search . '%');
            })->paginate($this->perPage),
        ])->extends('layouts.app')->section('content');
    }

    // Confirmar eliminación

    public function confirmDelete($id)
    {
        $this->dispatchBrowserEvent('confirm-delete', [
            'title' => 'Eliminar categoría',
            'text' => '¿Estás seguro de eliminar esta categoría?',
            'icon' => 'warning',
            'id' => $id,
        ]);
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
    }
}
