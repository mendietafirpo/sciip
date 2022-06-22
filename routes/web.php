<?php
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Livewire\Home;
use App\Http\Livewire\Dashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\LoadImageController;
use App\Http\Livewire\Post\PostManager;


//middlwate setLocale
Route::group([
    'middleware' => 'setLocale'], function() {

        Route::middleware(['auth:sanctum','verified'])->group(function () {

            Route::get('/dashboard', Dashboard::class)->name('dashboard');

            Route::match(['get', 'post'],'/post/post-manager', PostManager::class,'upload')->name('post.manager');

            Route::post('/upload', [LoadImageController::class,'upload'])->name('posts.images');

         });


        Route::get('/',Home::class)->name('welcome');
        Route::get('/',Home::class)->name('welcome');

        Route::get('auth/google',[GoogleController::class,'redirectToGoogle']);
        Route::get('auth/google/callback',[GoogleController::class,'handleGoogleCallback']);

        Route::get('auth/facebook',[FacebookController::class,'redirectToFacebook']);
        Route::get('auth/facebook/callback',[FacebookController::class,'handleFacebookCallback']);
});


