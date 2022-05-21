<?php

use Illuminate\Support\Facades\Route;
use App\Models\Blog;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $blogs = Blog::findAll();
    return view('hello',['blogs'=> $blogs]);
    //return view('helloWorld');
});

//messy way
Route::get('blogs/{blog}', function ($slug) {
    $path = __DIR__ . "/../resources/blog/{$slug}.html";
    if (! file_exists($path)){
        //dd is die and dump
        //ddd('File not exist');
        //ddd is dump die debug
        //abort(404);
        return redirect('/');
    }
    $blog = cache()->remember("blogs.{slug}", now()->addMinutes(1),function() use($path){
        //var_dump('file_get_contents');
        return file_get_contents($path);
    });
    
    return view('blog', ['blog'=> $blog]);
})->where('blog','[A-z_\-]+'); 

/*Cleaner way
Route::get('blogs/{blog}', function ($slug) {
    //find a blog by its slug and pass it to a view called blog
    $blog = Blog::find($slug);
    
    return view('blog', ['blog'=> $blog]);
});*/