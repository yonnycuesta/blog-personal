<?php

use App\Http\Controllers\Admin\ContactController;
use App\Http\Livewire\Frontend\Home\BlogDetails;
use App\Http\Livewire\Frontend\Home\Home;
use App\Http\Livewire\Frontend\Home\PortfolioDetails;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', [Home::class, 'render'])->name('home');
Route::get('portfolio/{portfolio}', [PortfolioDetails::class, 'mount'])->name('portfolio');
Route::get('blog/{post}', [BlogDetails::class, 'mount'])->name('blog');
Route::post('contact/store', [ContactController::class, 'store'])->name('contact.store');
Route::post('comment/store', [ContactController::class, 'commentStore'])->name('comment.store');

