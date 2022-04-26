<?php

namespace App\Http\Livewire\Admin\Category;

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

        return view('livewire.admin.category.category-list', [
            'categories' => Category::when($this->search, function ($query, $search) {
                return $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhereHas('posts', function ($query) {
                        return $query->where('title', 'like', '%' . $this->search . '%');
                    });
            })->OrderBy('id', 'desc')->paginate($this->perPage)->withQueryString(),
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

        /* Eliminar la categoria si esta no esta relacionada con ningun post y
        /* si esta relacionada con algun post mostrar un mensaje de error
        */

        if ($category->posts->isEmpty()) {
            $category->delete();
            $this->dispatchBrowserEvent('toastr-delete', [
                'title' => 'Categoría eliminada',
                'type' => 'success',
                'message' => 'Categoría eliminada éxitosamente',
                'timer' => 3000,
            ]);
        } else {
            $this->dispatchBrowserEvent('toastr-no-delete', [
                'title' => 'Categoría no eliminada',
                'type' => 'error',
                'message' => 'La categoría no puede ser eliminada porque esta relacionada con algun post',
                'timer' => 3000,
            ]);
        }
    }
}
