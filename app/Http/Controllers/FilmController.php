<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FilmController extends Controller
{
    public function index()
    {
        $films = Film::with(['genre', 'reviews'])->get();
        return view('partial.film.listFilm', compact('films'));
    }

    public function create()
    {
        $genres = Genre::all();
        return view('partial.film.addFilm', compact('genres'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'required|string',
            'release_year' => 'required|string|max:255',
            'poster' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // Validasi gambar
            'genre_id' => 'required|exists:genres,id',
        ]);

        $posterPath = $request->file('poster')->store('posters', 'public');
        Film::create([
            'title' => $request->input('title'),
            'summary' => $request->input('summary'),
            'release_year' => $request->input('release_year'),
            'poster' => $posterPath,
            'genre_id' => $request->input('genre_id'),
        ]);
        return redirect()->route('film.index')->with('success', 'Film created successfully.');
    }

    public function addReview(Request $request, $id)
    {
        $film = Film::findOrFail($id);

        $request->validate([
            'content' => 'required|string',
            'point' => 'required|integer|min:1|max:100',
        ]);
        $film->reviews()->create([
            'user_id' => auth()->id(), // Pastikan user login
            'content' => $request->input('content'),
            'point' => $request->input('point'),
        ]);

        return redirect()->route('film.show', $id)->with('success', 'Review berhasil ditambahkan.');
    }

    public function show($id)
    {
        $film = Film::with(['genre', 'reviews.user', 'filmcasts'])->findOrFail($id);
        // dd($film->filmcasts);
        return view('partial.film.showFilm', compact('film'));
    }

    public function edit($id)
    {
        $film = Film::findOrFail($id);
        $genres = Genre::all();
        return view('partial.film.editFilm', compact('film', 'genres'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'required|string',
            'release_year' => 'required|string|max:255',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'genre_id' => 'required|exists:genres,id',
        ]);

        $film = Film::findOrFail($id);
        if ($request->hasFile('poster')) {
            // Menghapus gambar lama jika ada
            if ($film->poster) {
                Storage::disk('public')->delete($film->poster);
            }

            // Mengupload gambar baru
            $posterPath = $request->file('poster')->store('posters', 'public');
            $film->poster = $posterPath;
        }

        // Memperbarui data film lainnya
        $film->update([
            'title' => $request->input('title'),
            'summary' => $request->input('summary'),
            'release_year' => $request->input('release_year'),
            'genre_id' => $request->input('genre_id'),
        ]);
        return redirect()->route('film.index')->with('success', 'Film updated successfully.');
    }

    public function destroy($id)
    {
        $film = Film::findOrFail($id);
        $film->delete();
        return redirect()->route('film.index')->with('success', 'Film deleted successfully.');
    }
}
