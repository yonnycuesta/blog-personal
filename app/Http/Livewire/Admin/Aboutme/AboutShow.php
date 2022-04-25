<?php

namespace App\Http\Livewire\Admin\Aboutme;

use App\Models\Aboutme;
use Livewire\Component;

class AboutShow extends Component
{
    public Aboutme $about;

    public function mount(Aboutme $about)
    {
        $this->about = $about;
    }

    public function render()
    {
        return view('livewire.admin.aboutme.about-show')
            ->extends('layouts.app')
            ->section('content');
    }
}
