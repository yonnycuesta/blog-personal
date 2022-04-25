<?php

namespace App\Http\Livewire\Admin\Module;

use App\Models\Module;
use Livewire\Component;
use Livewire\WithPagination;

class ModuleList extends Component
{
    // Librerias
    use WithPagination;

    // Propiedades publicas
    public $search;

    // Propiedades privadas y protegidas
    private $perPage = 5;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'delete',
    ];

    public function render()
    {

        return view('livewire.admin.module.module-list', [
            'modules' => Module::when($this->search, function ($query, $search) {
                return $query->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('subtitle', 'like', '%' . $this->search . '%')
                    ->orWhere('content', 'like', '%' . $this->search . '%')
                    ->orWhereHas('post', function ($query) use ($search) {
                        $query->where('title', 'like', '%' . $search . '%');
                    });
            })->OrderBy('id', 'desc')->paginate($this->perPage)->withQueryString(),
        ])->extends('layouts.app')->section('content');
    }

    public function confirmDelete($id)
    {
        $this->dispatchBrowserEvent('confirm-delete', [
            'title' => 'Eliminar módulo',
            'text' => '¿Estás seguro de eliminar este módulo?',
            'icon' => 'warning',
            'id' => $id,
        ]);
    }

    public function delete($id)
    {
        $module = Module::find($id);
        $module->delete();

        $this->dispatchBrowserEvent('toastr-delete', [
            'title' => 'Módulo eliminado',
            'message' => '¡El módulo ha sido eliminado exitosamente!',
            'status' => 'success',
            'timer' => 3000,
        ]);
    }

    // Detalles del modulo
    public function show(Module $module)
    {
        //$this->module = $module;

        return view('livewire.admin.module.module-show', [
            'module' => $module,
        ]);
    }
}
