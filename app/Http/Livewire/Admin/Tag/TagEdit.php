<?php

namespace App\Http\Livewire\Admin\Tag;

use App\Models\Portfolio;
use App\Models\Post;
use App\Models\Tag;
use Livewire\Component;

class TagEdit extends Component
{
    public $posts, $portfolios;
    public Tag $tag;

    public function mount(Tag $tag)
    {
        $this->tag = $tag;
        $this->posts = Post::all();
        $this->portfolios = Portfolio::all();
    }

    public function render()
    {
        return view('livewire.admin.tag.tag-edit')
            ->extends('layouts.app')
            ->section('content');
    }

    protected $rules = [
        'tag.name' => 'required|min:3|max:50',
        'tag.post_id' => 'numeric|nullable',
        'tag.portfolio_id' => 'numeric|nullable',
    ];

    protected $messages = [
        'tag.name.required' => 'El nombre es requerido',
        'tag.name.min' => 'El nombre debe tener al menos 3 caracteres',
        'tag.name.max' => 'El nombre debe tener máximo 50 caracteres',
        'tag.post_id.numeric' => 'El post debe ser un número',
        'tag.portfolio_id.numeric' => 'El portfolio debe ser un número',
    ];

    public function update()
    {
        $this->validate($this->rules, $this->messages);

        $this->tag->update([
            'name' => $this->tag->name,
            'post_id' => $this->tag->post_id,
            'portfolio_id' => $this->tag->portfolio_id,
        ]);

        $this->dispatchBrowserEvent('toastr-update', [
            'title' => 'Etiqueta actualizada',
            'message' => '¡Etiqueta actualizada éxitosamente!',
        ]);

        return redirect()->route('tags.index');
    }
}
