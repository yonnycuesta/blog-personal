<?php

namespace App\Http\Livewire\Admin\Portfolio;

use App\Models\Category;
use App\Models\Portfolio;
use Livewire\Component;
use Livewire\WithFileUploads;

class PortfolioCreate extends Component
{
    use WithFileUploads;

    public $title, $category_id, $categories, $photo,
        $description, $date_created, $portf_client, $portf_url;

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function render()
    {
        return view('livewire.admin.portfolio.portfolio-create')
            ->extends('layouts.app')
            ->section('content');
    }

    protected $rules = [
        'title' => 'required|min:3|max:100',
        'description' => 'required|min:3',
        'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|nullable',
        'portf_client' => 'min:3|max:100',
        'portf_url' => 'min:3|max:100',
        'date_created' => 'date|nullable',
        'category_id' => 'required|numeric',
    ];

    protected $messages = [
        'title.required' => 'El título es requerido',
        'title.min' => 'El título debe tener al menos 3 caracteres',
        'title.max' => 'El título debe tener máximo 100 caracteres',
        'description.required' => 'La descripción es requerida',
        'description.min' => 'La descripción debe tener al menos 3 caracteres',
        'photo.image' => 'La imagen debe ser un archivo de imagen',
        'photo.mimes' => 'La imagen debe ser un archivo de tipo: jpeg,png,jpg,gif,svg',
        'portf_client.min' => 'El cliente debe tener al menos 3 caracteres',
        'portf_client.max' => 'El cliente debe tener máximo 100 caracteres',
        'portf_url.min' => 'La url debe tener al menos 3 caracteres',
        'portf_url.max' => 'La url debe tener máximo 100 caracteres',
        'date_created.date' => 'La fecha debe ser una fecha válida',
        'category_id.required' => 'La categoría es requerida',
        'category_id.numeric' => 'La categoría debe ser un número',
    ];

    public function limpiarCampos()
    {
        $this->reset('title', 'category_id', 'description', 'portf_client', 'portf_url', 'date_created');
    }

    // Validación en tiempo real
    public function updated($field)
    {
        $this->validateOnly($field, $this->rules, $this->messages);
    }

    public function store()
    {
        $this->validate();

        $file_save = $this->photo ? 'storage/' . $this->photo->store('portfolios', 'public') : null;

        Portfolio::create([
            'title' => $this->title,
            'description' => $this->description,
            'photo' => $file_save,
            'portf_client' => $this->portf_client,
            'portf_url' => $this->portf_url,
            'date_created' => $this->date_created,
            'category_id' => $this->category_id,
        ]);

        $this->limpiarCampos();

        $this->dispatchBrowserEvent('toastr-create', [
            'title' => 'Proyecto creado',
            'message' => '¡Proyecto guardado éxitosamente!',
            'status' => 'success',
            'timer' => 3000,
        ]);
    }
}
