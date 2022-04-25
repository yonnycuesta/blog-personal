<?php

namespace App\Http\Livewire\Admin\Service;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;

class ServiceList extends Component
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

        return view('livewire.admin.service.service-list', [
            'services' => Service::when($this->search, function ($query, $search) {
                return $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%')
                    ->OrderBy('id', 'desc');
            })->paginate($this->perPage),
        ])->extends('layouts.app')->section('content');
    }

    public function confirmDelete($id)
    {
        $this->dispatchBrowserEvent('confirm-delete', [
            'title' => 'Eliminar registro',
            'text' => '¿Estás seguro de eliminar este registro?',
            'icon' => 'warning',
            'id' => $id,
        ]);
    }

    public function delete($id)
    {
        $service = Service::find($id);
        $service->delete();

        $this->dispatchBrowserEvent('toastr-delete', [
            'title' => 'Servicio eliminado',
            'message' => '¡El servicio ha sido eliminado correctamente!',
            'status' => 'success',
            'timer' => 3000,
        ]);
    }

    public function show(Service $service)
    {
        $this->service = $service;
        return view('livewire.admin.service.service-show', [
            'service' => $service,
        ]);
    }
}
