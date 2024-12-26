<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with(['user', 'film'])->get();
        return view('partial.review.listReview', compact('reviews'));
    }
    public function indexById($filmId)
    {
        $film = Film::findOrFail($filmId);
        $reviews = $film->reviews;
        return view('partial.review.listReview', compact('film', 'reviews'));
    }

    public function create()
    {
        $films = Film::all();
        return view('partial.review.addReview', compact('films'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'film_id' => 'required|exists:films,id',
            'content' => 'required|string|max:255',
            'point' => 'required|integer',
        ]);
        $request->merge(['user_id' => auth()->id()]);

        $existingReview = Review::where('user_id', auth()->id())
            ->where('film_id', $request->film_id)
            ->first();

        if ($existingReview) {
            return redirect()->back()->withErrors(['film_id' => 'You have already reviewed this film.'])->withInput();
        }
        Review::create($request->all());
        return redirect()->route('review.index')->with('success', 'Review created successfully.');
    }

    public function show($id)
    {
        $review = Review::with(['user', 'film'])->findOrFail($id);
        return view('partial.review.showReview', compact('review'));
    }

    public function edit($id)
    {
        $review = Review::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $films = Film::all();
        return view('partial.review.editReview', compact('review', 'films'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'film_id' => 'required|exists:films,id',
            'content' => 'required|string|max:255',
            'point' => 'required|integer',
        ]);
        $request->merge(['user_id' => auth()->id()]);
        $review = Review::findOrFail($id);
        $review->update($request->all());
        return redirect()->route('review.index')->with('success', 'Review updated successfully.');
    }

    public function destroy($id)
    {
        $review = Review::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $review->delete(); // Menghapus hanya review, film tidak terhapus
        return redirect()->route('review.index')->with('success', 'Review deleted successfully.');
    }
}
