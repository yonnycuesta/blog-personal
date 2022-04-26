<?php

namespace App\Http\Livewire\Admin\Gallery;

use App\Models\Gallery;
use Livewire\Component;
use Livewire\WithPagination;

class GalleryList extends Component
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

        return view('livewire.admin.gallery.gallery-list', [
            'galleries' => Gallery::when($this->search, function ($query, $search) {
                return $query->whereHas('post', function ($query) use ($search) {
                    $query->where('title', 'like', '%' . $search . '%');
                });
            })->OrderBy('id', 'desc')->paginate($this->perPage)->withQueryString(),
        ])->extends('layouts.app')->section('content');
    }

    public function confirmDelete($id)
    {
        $this->dispatchBrowserEvent('confirm-delete', [
            'title' => 'Eliminar imágen',
            'text' => '¿Estás seguro de eliminar esta imágen?',
            'icon' => 'warning',
            'id' => $id,
        ]);
    }

    public function delete($id)
    {
        $gallery = Gallery::find($id);

        if ($gallery->photo) {
            unlink($gallery->photo);
        }
        $gallery->delete();

        $this->dispatchBrowserEvent('toastr-delete', [
            'title' => 'Imágen eliminada',
            'message' => '¡La imágen ha sido eliminada exitosamente!',
            'status' => 'success',
            'timer' => 3000,
        ]);
    }
}
