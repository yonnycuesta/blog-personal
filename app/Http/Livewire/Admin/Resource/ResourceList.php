<?php

namespace App\Http\Livewire\Admin\Resource;

use App\Models\Resource;
use Livewire\Component;
use Livewire\WithPagination;

class ResourceList extends Component
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

        return view('livewire.admin.resource.resource-list', [
            'resources' => Resource::when($this->search, function ($query, $search) {
                return $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('url', 'like', '%' . $this->search . '%')
                    ->orWhereHas('post', function ($query) use ($search) {
                        $query->where('title', 'like', '%' . $search . '%');
                    });
            })->OrderBy('id', 'desc')->paginate($this->perPage)->withQueryString(),
        ])->extends('layouts.app')->section('content');
    }

    public function confirmDelete($id)
    {
        $this->dispatchBrowserEvent('confirm-delete', [
            'title' => 'Eliminar recurso',
            'text' => '¿Estás seguro de eliminar este recurso?',
            'icon' => 'warning',
            'id' => $id,
        ]);
    }

    public function delete($id)
    {
        $resource = Resource::find($id);
        $resource->delete();

        $this->dispatchBrowserEvent('toastr-delete', [
            'title' => 'Recurso eliminado',
            'message' => '¡El recurso ha sido eliminado exitosamente!',
            'status' => 'success',
            'timer' => 3000,
        ]);
    }
}
