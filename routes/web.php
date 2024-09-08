<?php

use App\Livewire\Frontend\About;
use App\Livewire\Frontend\Home;
use App\Livewire\Frontend\Project\Create;
use App\Livewire\Frontend\Project\Donator;
use App\Livewire\Frontend\Project\View;
use App\Livewire\Frontend\User\Project;
use App\Livewire\Frontend\User\Register;
use Illuminate\Support\Facades\Route;

Route::middleware([])->group(function() {
    Route::get('/', Home::class);
    Route::get('/registration', Register::class);
    Route::get('/about-us', About::class);
    Route::get('/donators/{project}', Donator::class);
    Route::get('/project/{slug}', View::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/projects', Project::class);
});
