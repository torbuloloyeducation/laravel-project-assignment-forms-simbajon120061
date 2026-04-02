<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome', [
    'greeting' => 'Hello, World!',
    'name' => 'John Doe',
    'age' => 30,
    'tasks' => [
        'Learn Laravel',
        'Build a project',
        'Deploy to production',
    ],
]);


use App\Http\Controllers\EmailController;

Route::get('/formtest', [EmailController::class, 'index']);
Route::post('/formtest', [EmailController::class, 'store']);
Route::post('/delete-email/{index}', [EmailController::class, 'destroy']);
Route::post('/clear-emails', [EmailController::class, 'clear']);

Route::get('/', function () {
    return view('welcome');
});


Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/services', function () {
    return view('services');
});

Route::get('/showcases', function () {
    return view('showcases');
});

Route::get('/blog', function () {
    return view('blog');
});