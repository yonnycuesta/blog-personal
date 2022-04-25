<?php

namespace App\Http\Livewire\Admin\Aboutme;

use App\Models\Aboutme;
use Livewire\Component;
use Livewire\WithPagination;

class AboutList extends Component
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

        return view('livewire.admin.aboutme.about-list', [
            'aboutme' => Aboutme::when($this->search, function ($query, $search) {
                return $query->where('fullname', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%')
                    ->orWhere('phone', 'like', '%' . $this->search . '%')
                    ->orWhere('address', 'like', '%' . $this->search . '%')
                    ->OrderBy('id', 'desc');
            })->paginate($this->perPage),
        ])->extends('layouts.app')->section('content');
    }

    // Confirmar eliminación

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
        $aboutme = Aboutme::find($id);
        // Eliminar la imagen de la carpeta public si existe asociada al registro
        if ($aboutme->photo) {
            unlink($aboutme->photo);
        }
        $aboutme->delete();
    }

   
}
