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


Route::get('/formtest', function(){
    $emails = session()->get('$emails', []);

    return view('formtest',[
        'emails' => $emails,
    ]);
});

Route::post('/formtest', function(){
    // Task 2: Validation
    request()->validate([
        'email' => ['required', 'email']
    ]);

    $email = request('email');
    $emails = session()->get('$emails', []);

    // Task 3: Prevent Duplicates
    if (in_array($email, $emails)) {
        return redirect('/formtest')->with('error', 'That email is already in the list!');
    }

    // Task 6: Limit Entries
    if (count($emails) >= 5) {
        return redirect('/formtest')->with('error', 'Limit reached! (Max 5)');
    }

    session()->push('$emails', $email);

    return redirect('/formtest')->with('success', 'Email added successfully!');
});

Route::post('/delete-email/{index}', function($index){
    $emails = session()->get('$emails', []);
    
    if (isset($emails[$index])) {
        unset($emails[$index]);
        // Re-index the array so there are no gaps
        session()->put('$emails', array_values($emails));
    }

    return redirect('/formtest');
});

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