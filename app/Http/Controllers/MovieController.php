<?php

namespace App\Http\Controllers;


use App\Models\Movie;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;
use App\Http\Resources\MovieResource;
use App\Http\Requests\StoreMovieRequest;

class MovieController extends Controller
{
    use UploadImageTrait;
    
    public function index()
    {   
        $movies = MovieResource::collection(Movie::all());
        return inertia('Movies/Index', compact('movies'));
    }

    public function create()
    {
        return inertia('Movies/CreateMovie');
    }

    public function store(StoreMovieRequest $request)
    {
        $path = $this->uploadImage($request, 'Movies');
        Movie::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'rate'=>$request->rate,
            'image_path'=>$path,
            'category_id'=>$request->category,
        ]);
        
        return redirect()->route('movies.index')->with('message', 'Movie Created Successfully');
    }

    public function edit(Movie $movie)
    {
        return inertia('Movies/EditMovie', ['movie'=>$movie]);
    }

    public function update(Movie $movie, Request $request)
    {
        
        //$path = $this->uploadImage($request, 'Movies');
        $movie->title = $request->title;
        $movie->description = $request->description;
        $movie->rate = $request->rate;
        $movie->image_path = $request->image_path;
        $movie->category_id = $request->category_id;
        $movie->save();

        return redirect()->route('movies.index')->with('message', 'Movie Updated Successfully');
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect()->route('movies.index')->with('message', 'Movie Deleted Successfully');
    }   
}
