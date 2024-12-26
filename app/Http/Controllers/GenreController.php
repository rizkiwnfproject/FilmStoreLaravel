<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::withCount('films')->get();
        return view('partial.genre.listGenre', compact('genres'));
    }

    public function create()
    {
        return view('partial.genre.addGenre');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Genre::create($request->all());
        return redirect()->route('genre.index')->with('success', 'Genre created successfully.');
    }

    public function show($id)
    {
        $genre = Genre::with('films')->findOrFail($id);

        return view('partial.genre.showGenre', compact('genre'));
    }

    public function edit($id)
    {
        $genre = Genre::findOrFail($id);
        return view('partial.genre.editGenre', compact('genre'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $genre = Genre::findOrFail($id);
        $genre->update($request->all());
        return redirect()->route('genre.index')->with('success', 'Genre updated successfully.');
    }

    public function destroy($id)
    {
        $genre = Genre::findOrFail($id);
        $genre->delete();
        return redirect()->route('genre.index')->with('success', 'Genre deleted successfully.');
    }
}
