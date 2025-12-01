<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PricingPlanController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\VideoController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/demo', [HomeController::class, 'demo'])->name('demo');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::get('/pricing', [PricingController::class, 'index'])->name('pricing');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/contact/thanks', [ContactController::class, 'thanks'])->name('contact.thanks');

// Admin Routes
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Videos
    Route::resource('videos', VideoController::class)->except(['show']);
    Route::post('/videos/order', [VideoController::class, 'updateOrder'])->name('videos.order');
    Route::patch('/videos/{video}/toggle-publish', [VideoController::class, 'togglePublish'])->name('videos.toggle-publish');

    // Pricing Plans
    Route::resource('pricing', PricingPlanController::class)->except(['show']);

    // Contacts
    Route::get('/contacts', [AdminContactController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/{contact}', [AdminContactController::class, 'show'])->name('contacts.show');
    Route::patch('/contacts/{contact}/status', [AdminContactController::class, 'updateStatus'])->name('contacts.status');
    Route::patch('/contacts/{contact}/note', [AdminContactController::class, 'updateNote'])->name('contacts.note');
    Route::delete('/contacts/{contact}', [AdminContactController::class, 'destroy'])->name('contacts.destroy');

    // Site Settings
    Route::get('/settings', [SiteSettingController::class, 'edit'])->name('settings.edit');
    Route::put('/settings', [SiteSettingController::class, 'update'])->name('settings.update');
});

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
