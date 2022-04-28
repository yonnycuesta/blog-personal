<?php

namespace App\Http\Livewire\Frontend\Home;

use App\Models\Portfolio;
use Livewire\Component;

class PortfolioDetails extends Component
{
    public Portfolio $portfolio;

    public function mount(Portfolio $portfolio)
    {
        $this->portfolio = $portfolio;
        return view('livewire.frontend.home.portfolio-details', compact('portfolio'));
    }

    public function render()
    {
        return view('livewire.frontend.home.portfolio-details');
    }
}
