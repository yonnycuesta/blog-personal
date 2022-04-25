<?php

namespace App\Http\Livewire\Admin\Portfolio;

use App\Models\Portfolio;
use Livewire\Component;
use Livewire\WithPagination;

class PortfolioList extends Component
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

        return view('livewire.admin.portfolio.portfolio-list', [
            'portfolios' => Portfolio::when($this->search, function ($query, $search) {
                return $query->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%')
                    ->orWhere('portf_client', 'like', '%' . $this->search . '%')
                    ->orWhere('date_created', 'like', '%' . $this->search . '%')
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
        $portfolio = Portfolio::find($id);
        // Eliminar la imagen de la carpeta public si existe asociada al registro
        if ($portfolio->photo) {
            unlink($portfolio->photo);
        }
        $portfolio->delete();

        $this->dispatchBrowserEvent('toastr-delete', [
            'title' => 'Proyecto eliminado',
            'message' => '¡El proyecto ha sido eliminado correctamente!',
            'status' => 'success',
            'timer' => 3000,
        ]);
    }

    // Detalles del post
    public function show(Portfolio $portfolio)
    {
        $this->portfolio = $portfolio;
        return view('livewire.admin.portfolio.portfolio-show', [
            'portfolio' => $portfolio,
        ]);
    }
}
