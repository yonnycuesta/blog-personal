<?php

namespace App\Http\Livewire\Admin\Award;

use App\Models\Award;
use Livewire\Component;
use Livewire\WithPagination;

class AwardList extends Component
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

        return view('livewire.admin.award.award-list', [
            'awards' => Award::when($this->search, function ($query, $search) {
                return $query->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('quantity', 'like', '%' . $this->search . '%')
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
        $award = Award::find($id);
        $award->delete();

        $this->dispatchBrowserEvent('toastr-delete', [
            'title' => 'Logro eliminado',
            'message' => '¡El logro ha sido eliminado correctamente!',
            'status' => 'success',
            'timer' => 3000,
        ]);
    }
}
