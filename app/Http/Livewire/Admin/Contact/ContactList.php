<?php

namespace App\Http\Livewire\Admin\Contact;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class ContactList extends Component
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

        return view('livewire.admin.contact.contact-list', [
            'contacts' => Contact::when($this->search, function ($query, $search) {
                return $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%');
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
        $contact = Contact::find($id);
        $contact->delete();

        $this->dispatchBrowserEvent('toastr-delete', [
            'title' => 'Mensaje eliminado',
            'message' => '¡El mensaje ha sido eliminado correctamente!',
            'status' => 'success',
            'timer' => 3000,
        ]);
    }

    public function show(Contact $contact)
    {
        $this->contact = $contact;
        return view('livewire.admin.contact.contact-show', [
            'contact' => $contact,
        ]);
    }
}
