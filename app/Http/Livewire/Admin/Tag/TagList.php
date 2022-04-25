<?php

namespace App\Http\Livewire\Admin\Tag;

use App\Models\Tag;
use Livewire\Component;
use Livewire\WithPagination;

class TagList extends Component
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

        return view('livewire.admin.tag.tag-list', [
            'tags' => Tag::when($this->search, function ($query, $search) {
                return $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhereHas('post', function ($query) use ($search) {
                        $query->where('title', 'like', '%' . $search . '%');
                    })
                    ->orWhereHas('portfolio', function ($query) use ($search) {
                        $query->where('title', 'like', '%' . $search . '%');
                    });
            })->OrderBy('id', 'desc')->paginate($this->perPage)->withQueryString(),
        ])->extends('layouts.app')->section('content');
    }

    public function confirmDelete($id)
    {
        $this->dispatchBrowserEvent('confirm-delete', [
            'title' => 'Eliminar etiqueta',
            'text' => '¿Estás seguro de eliminar esta etiqueta?',
            'icon' => 'warning',
            'id' => $id,
        ]);
    }

    public function delete($id)
    {
        $tag = Tag::find($id);
        $tag->delete();

        $this->dispatchBrowserEvent('toastr-delete', [
            'title' => 'Etiqueta eliminada',
            'message' => '¡La etiqueta ha sido eliminada correctamente!',
            'status' => 'success',
            'timer' => 3000,
        ]);
    }
}
