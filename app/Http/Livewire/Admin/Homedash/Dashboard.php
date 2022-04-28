<?php

namespace App\Http\Livewire\Admin\Homedash;

use App\Models\Category;
use App\Models\Contact;
use App\Models\Portfolio;
use App\Models\Post;
use Livewire\Component;

class Dashboard extends Component
{


    public function render()
    {
        // Obtener el número de registros de categorías

        $category_count = Category::count();
        $post_count = Post::count();
        $portfolio_count = Portfolio::count();
        $contact_count = Contact::count();

        return view('livewire.admin.homedash.dashboard', compact('category_count', 'post_count', 'portfolio_count', 'contact_count'))
            ->extends('layouts.app')
            ->section('content');
    }
}
