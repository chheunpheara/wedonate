<?php

use App\Http\Controllers\Controller;
use App\Livewire\Backend\AccountSetting;
use App\Livewire\Backend\Dashboard;
use App\Livewire\Backend\DonationActivity;
use App\Livewire\Frontend\About;
use App\Livewire\Frontend\Home;
use App\Livewire\Frontend\Project\Donator;
use App\Livewire\Frontend\Project\View;
use App\Livewire\Backend\Project\Project;
use App\Livewire\Backend\Sse;
use App\Livewire\Frontend\DonationChart;
use App\Livewire\Frontend\HelpCenter;
use App\Livewire\Frontend\Project\Creator;
use Illuminate\Support\Facades\Route;

Route::middleware([])->group(function () {
    Route::get('/', Home::class);
    Route::get('/about-us', About::class);
    Route::get('/donators/{project}', Donator::class);
    Route::get('/project/{slug}', View::class);
    Route::get('/creator/{slug}', Creator::class);
    Route::get('/helps', HelpCenter::class);
    Route::get('/dummy-chart/{project}', DonationChart::class);
    Route::get('/events/sse', Sse::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/projects', Project::class);
    Route::get('/account-settings', AccountSetting::class);
    Route::get('/dashboard', Dashboard::class);
    Route::get('/activities', DonationActivity::class);
});
