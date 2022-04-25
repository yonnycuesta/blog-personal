<?php

namespace App\Http\Livewire\Admin\Portfolio;

use App\Models\Category;
use App\Models\Portfolio;
use Livewire\Component;
use Livewire\WithFileUploads;

class PortfolioEdit extends Component
{
    use WithFileUploads;
    public Portfolio $portfolio;
    public $photo, $categories;

    public function mount(Portfolio $portfolio)
    {
        $this->portfolio = $portfolio;
        $this->categories = Category::all();
    }

    public function render()
    {
        return view('livewire.admin.portfolio.portfolio-edit')
            ->extends('layouts.app')
            ->section('content');
    }

    protected $rules = [
        'portfolio.title' => 'required|min:3|max:100',
        'portfolio.description' => 'required|min:3',
        'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|nullable',
        'portfolio.portf_client' => 'min:3|max:100',
        'portfolio.portf_url' => 'min:3|max:100',
        'portfolio.date_created' => 'date|nullable',
        'portfolio.category_id' => 'required|numeric',
    ];

    protected $messages = [
        'portfolio.title.required' => 'El título es requerido',
        'portfolio.title.min' => 'El título debe tener al menos 3 caracteres',
        'portfolio.title.max' => 'El título debe tener máximo 100 caracteres',
        'portfolio.description.required' => 'La descripción es requerida',
        'portfolio.description.min' => 'La descripción debe tener al menos 3 caracteres',
        'photo.image' => 'La imagen debe ser un archivo de imagen',
        'photo.mimes' => 'La imagen debe ser un archivo de tipo: jpeg,png,jpg,gif,svg',
        'portfolio.portf_client.min' => 'El cliente debe tener al menos 3 caracteres',
        'portfolio.portf_client.max' => 'El cliente debe tener máximo 100 caracteres',
        'portfolio.portf_url.min' => 'La url debe tener al menos 3 caracteres',
        'portfolio.portf_url.max' => 'La url debe tener máximo 100 caracteres',
        'portfolio.date_created.date' => 'La fecha debe ser una fecha válida',
        'portfolio.category_id.required' => 'La categoría es requerida',
        'portfolio.category_id.numeric' => 'La categoría debe ser un número',
    ];


    // Validación en tiempo real
    public function updated($field)
    {
        $this->validateOnly($field, $this->rules, $this->messages);
    }

    public function update()
    {
        $this->validate($this->rules, $this->messages);

        $this->portfolio->update([
            'title' => $this->portfolio->title,
            'description' => $this->portfolio->description,
            'photo' => $this->photo ? 'storage/' . $this->photo->store('portfolios', 'public') : $this->portfolio->photo,
            'portf_client' => $this->portfolio->portf_client,
            'portf_url' => $this->portfolio->portf_url,
            'date_created' => $this->portfolio->date_created,
            'category_id' => $this->portfolio->category_id,
        ]);


        $this->dispatchBrowserEvent('toastr-update', [
            'title' => 'Proyecto actualizado',
            'message' => '¡Proyecto actualizado éxitosamente!',
            'status' => 'success',
            'timer' => 3000,
        ]);

        return redirect()->route('portfolios.index');
    }
}
