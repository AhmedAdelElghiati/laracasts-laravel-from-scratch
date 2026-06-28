<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome' ,
    [
        'greeting' => 'Hello',
        'person' => request('person', 'World')
    ]);
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::view('/directives', 'directives' , ['tasks' =>[
    'Go to the supermarket',
    'Make a coffee',
    'Go to the gym',
    'Do homework'
]]);
