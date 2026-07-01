<?php

use App\Models\Idea;
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
//    $ideas = session()->get('ideas', []);
    $ideas = Idea::query()
        ->when(request('state'),function ($query, $state) {
            $query->where('state', $state);
        })
        ->get();

    return view('ideas', [
        'ideas' => $ideas
    ]);
});

Route::post('/ideas', function () {
    $idea = request('idea');

    Idea::create(
        [
            'description' => $idea,
            'state' => 'pending'
        ]
    );

    return redirect('/ideas');
});
