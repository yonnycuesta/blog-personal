<?php

namespace App\Http\Livewire\Frontend\Home;

use App\Models\Comment;
use App\Models\Post;
use Livewire\Component;

class BlogDetails extends Component
{
    public Post $post;


    public function mount(Post $post)
    {
        $this->post = $post;
        return view('livewire.frontend.home.blog-details', compact('post'));
    }

    public function render()
    {

        return view('livewire.frontend.home.blog-details');
    }



}
