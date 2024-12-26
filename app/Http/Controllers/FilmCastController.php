<?php

namespace App\Http\Controllers;

use App\Models\Cast;
use App\Models\Film;
use App\Models\FilmCast;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FilmCastController extends Controller
{
    public function index()
    {
        $filmCasts = FilmCast::with(['film', 'cast'])->get();
        return view('partial.film_cast.listFilmCast', compact('filmCasts'));
    }

    public function create()
    {
        $films = Film::all();
        $casts = Cast::all();
        return view('partial.film_cast.addFilmCast', compact('films', 'casts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'film_id' => 'required|exists:films,id',
            'cast_id' => 'required|exists:cast,id',
            'role' => 'required|string|max:255',
        ]);
        // dd($request->all());

        FilmCast::create($request->all());
        return redirect()->route('film_cast.index')->with('success', 'Film-Cast relationship created successfully.');
    }

    public function show($id)
    {
        $film = FilmCast::with(['cast', 'film'])->where('film_id', $id)->get();
        return view('partial.film_cast.showFilmCast', compact('film'));
    }

    public function edit($id)
    {
        $filmCast = FilmCast::findOrFail($id);
        $films = Film::all();
        $casts = Cast::all();
        return view('partial.film_cast.editFilmCast', compact('filmCast', 'films', 'casts'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'film_id' => 'required|exists:films,id',
            'cast_id' => 'required|exists:casts,id',
            'role' => 'required|string|max:255',
        ]);

        $filmCast = FilmCast::findOrFail($id);
        $filmCast->update($request->all());
        return redirect()->route('film_cast.index')->with('success', 'Film-Cast relationship updated successfully.');
    }

    public function destroy($id)
    {
        $filmCast = FilmCast::findOrFail($id);
        $filmCast->delete();
        return redirect()->route('film_cast.index')->with('success', 'Film-Cast relationship deleted successfully.');
    }
}
