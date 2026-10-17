<?php

use App\Models\BusinessProfile;
use App\Models\Category;
use App\Models\MenuItem;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;

Livewire::setUpdateRoute(function ($handle) {
    return Route::post(config('app.asset_prefix') . '/livewire/update', $handle);
});

Livewire::setScriptRoute(function ($handle) {
    return Route::get(config('app.asset_prefix') . '/livewire/livewire.js', $handle);
});

Route::get('/', function () {
    $profile = BusinessProfile::active();
    $categories = Category::where('is_active', true)->orderBy('sort_order')->get();
    $menuItems = MenuItem::with('category')->available()->orderBy('sort_order')->get();
    $testimonials = Testimonial::approved()->latest()->get();

    return view('welcome', compact('profile', 'categories', 'menuItems', 'testimonials'));
});

Route::get('/order', function () {
    return view('order.create');
})->name('order.create');

Route::get('/order/tracking', function () {
    return view('order.tracking');
})->name('order.tracking');
