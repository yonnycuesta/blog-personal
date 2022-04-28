<?php

use App\Http\Controllers\Admin\ContactController;
use App\Http\Livewire\Frontend\Home\BlogDetails;
use App\Http\Livewire\Frontend\Home\Home;
use App\Http\Livewire\Frontend\Home\PortfolioDetails;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('livewire.frontend.home.home');
});
*/

Route::get('/', [Home::class, 'render'])->name('home');


Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('portfolio/{portfolio}', [PortfolioDetails::class, 'mount'])->name('portfolio');

Route::get('blog/{post}', [BlogDetails::class, 'mount'])->name('blog');

Route::post('contact/store', [ContactController::class, 'store'])->name('contact.store');
