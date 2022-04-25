<?php

namespace App\Http\Livewire\Admin\Testimonial;

use App\Models\Testimonial;
use Livewire\Component;
use Livewire\WithPagination;

class TestimonialList extends Component
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

        return view('livewire.admin.testimonial.testimonial-list', [
            'testimonials' => Testimonial::when($this->search, function ($query, $search) {
                return $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('designation', 'like', '%' . $this->search . '%')
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
        $testimonial = Testimonial::find($id);
        $testimonial->delete();

        $this->dispatchBrowserEvent('toastr-delete', [
            'title' => 'Testimonio eliminado',
            'message' => '¡El testimonio ha sido eliminado correctamente!',
            'status' => 'success',
            'timer' => 3000,
        ]);
    }

    // Detalles del testimonio
    public function show(Testimonial $testimonial)
    {

        return view('livewire.admin.testimonial.testimonial-show', [
            'testimonial' => $testimonial,
        ]);
    }
}
