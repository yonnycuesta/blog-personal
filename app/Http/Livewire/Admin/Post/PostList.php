<?php

namespace App\Http\Livewire\Admin\Post;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostList extends Component
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

        return view('livewire.admin.post.post-list', [
            'posts' => Post::when($this->search, function ($query, $search) {
                return $query->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%')
                    ->orWhere('datetime_created', 'like', '%' . $this->search . '%')
                    ->orWhereHas('category', function ($query) use ($search) {
                        $query->where('name', 'like', '%' . $search . '%');
                    });
                    
            })->OrderBy('id', 'desc')->paginate($this->perPage)->withQueryString(),
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
        $post = Post::find($id);
        // Eliminar la imagen de la carpeta public si existe asociada al registro
        if ($post->photo) {
            unlink($post->photo);
        }
        $post->delete();

        $this->dispatchBrowserEvent('toastr-delete', [
            'title' => 'Publicación eliminada',
            'message' => '¡La publicación ha sido eliminado correctamente!',
            'status' => 'success',
            'timer' => 3000,
        ]);
    }
}
