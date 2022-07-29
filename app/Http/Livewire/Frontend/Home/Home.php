<?php

namespace App\Http\Livewire\Frontend\Home;

use App\Models\Aboutme;
use App\Models\Award;
use App\Models\Category;
use App\Models\Portfolio;
use App\Models\Post;
use App\Models\Service;
use App\Models\Testimonial;
use Livewire\Component;

class Home extends Component
{

    public function render()
    {
        $aboutme = Aboutme::all();
        $services = Service::all();
        $awards = Award::all();
        $portfolios = Portfolio::all();
        $posts = Post::all();

        // Testimonios de manera aleatoria de acuerdo al id
        /*$testimonials = Testimonial::all();
        $testimonials_id = $testimonials->pluck('id')->toArray();
        $random = rand(0, count($testimonials_id) - 1);
        $testimonial = $testimonials_id[$random];
        $testimonial = Testimonial::find($testimonial);*/

        return view('livewire.frontend.home.home', compact('aboutme', 'services','awards','portfolios','posts'));
    }
}
