<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
class Blog extends Model
{
    use HasFactory;
    public static function find($slug){
        $path = resource_path("/blog/{$slug}.html");
        if (! file_exists($path)){
            //dd is die and dump
            //ddd('File not exist');
            //ddd is dump die debug
            //abort(404);
            //return redirect('/');
            throw new ModelNotFoundException();
        }
        return cache()->remember("blogs.{slug}", 5,fn()=>file_get_contents($path));
    
    }

    public static function findAll(){
        $files =  File::files(resource_path("blog/"));
        return array_map(function($f){
            return $f->getContents();
        },$files);
    }
}
