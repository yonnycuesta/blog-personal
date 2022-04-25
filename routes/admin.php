<?php

use App\Http\Livewire\Admin\Aboutme\AboutCreate;
use App\Http\Livewire\Admin\Aboutme\AboutEdit;
use App\Http\Livewire\Admin\Aboutme\AboutList;
use App\Http\Livewire\Admin\Aboutme\AboutShow;
use App\Http\Livewire\Admin\Award\AwardCreate;
use App\Http\Livewire\Admin\Award\AwardEdit;
use App\Http\Livewire\Admin\Award\AwardList;
use App\Http\Livewire\Admin\CategoryCreate;
use App\Http\Livewire\Admin\CategoryEdit;
use App\Http\Livewire\Admin\CategoryList;
use App\Http\Livewire\Admin\Post\PostCreate;
use App\Http\Livewire\Admin\Post\PostEdit;
use App\Http\Livewire\Admin\Post\PostList;
use App\Http\Livewire\Admin\Service\ServiceCreate;
use App\Http\Livewire\Admin\Service\ServiceEdit;
use App\Http\Livewire\Admin\Service\ServiceList;
use App\Http\Livewire\Admin\Testimonial\TestimonialCreate;
use App\Http\Livewire\Admin\Testimonial\TestimonialEdit;
use App\Http\Livewire\Admin\Testimonial\TestimonialList;
use Illuminate\Support\Facades\Route;

// Categorias
Route::get('categories', CategoryList::class)->name('categories');
Route::get('categories/create', CategoryCreate::class)->name('categories.create');
Route::get('categories/edit/{category}', CategoryEdit::class)->name('categories.edit');

// Sobre mi
Route::get('aboutme', AboutList::class)->name('aboutme.index');
Route::get('aboutme/create', AboutCreate::class)->name('aboutme.create');
Route::get('aboutme/edit/{about}', AboutEdit::class)->name('aboutme.edit');
Route::get('aboutme/details/{about}', AboutShow::class)->name('aboutme.details');

// Logros
Route::get('awards', AwardList::class)->name('awards.index');
Route::get('awards/create', AwardCreate::class)->name('awards.create');
Route::get('awards/edit/{award}', AwardEdit::class)->name('awards.edit');

// Servicios
Route::get('services', ServiceList::class)->name('services.index');
Route::get('services/create', ServiceCreate::class)->name('services.create');
Route::get('services/edit/{service}', ServiceEdit::class)->name('services.edit');
Route::get('services/show/{service}', [ServiceList::class, 'show'])->name('services.show');

// Testimonios
Route::get('testimonials', TestimonialList::class)->name('testimonials.index');
Route::get('testimonials/create', TestimonialCreate::class)->name('testimonials.create');
Route::get('testimonals/edit/{testimonial}', TestimonialEdit::class)->name('testimonials.edit');
Route::get('testimonals/show/{testimonial}', [TestimonialList::class, 'show'])->name('testimonials.show');

// Publicaciones
Route::get('posts', PostList::class,)->name('posts.index');
Route::get('posts/create', PostCreate::class,)->name('posts.create');
Route::get('posts/edit/{post}', PostEdit::class,)->name('posts.edit');