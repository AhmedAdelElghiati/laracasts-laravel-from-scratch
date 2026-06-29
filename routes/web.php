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


Route::get('/ideas', function () {
    $ideas = session()->get('ideas', []);
    return view('ideas', [
        'ideas' => $ideas
    ]);
});

Route::post('/ideas', function () {
    $idea = request('idea');

    session()->push('ideas', $idea);

    return redirect('/ideas');
});
