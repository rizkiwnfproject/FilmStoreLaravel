<?php

namespace App\Http\Controllers;

use App\Models\Cast;
use App\Models\User;
use Illuminate\Http\Request;

class CastController extends Controller
{
    public function index()
    {
        $casts = Cast::all();
        $users = User::all();
        return view('partial.cast.listCast', compact('casts', 'users'));
    }

    public function create()
    {
        // \Log::info('Create method accessed');
        return view('partial.cast.addCast');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'bio' => 'required|string',
        ]);

        Cast::create($request->all());
        return redirect()->route('cast.index')->with('success', 'Cast created successfully.');
    }

    public function show($id)
    {
        $cast = Cast::with(['filmcasts'])->findOrFail($id);
        return view('partial.cast.showCast', compact('cast'));
    }

    public function edit($id)
    {
        $cast = Cast::findOrFail($id);
        return view('partial.cast.editCast', compact('cast'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'bio' => 'required|string',
        ]);

        $cast = Cast::findOrFail($id);
        $cast->update($request->all());
        return redirect()->route('cast.index')->with('success', 'Cast updated successfully.');
    }

    public function destroy($id)
    {
        $cast = Cast::findOrFail($id);
        $cast->delete();
        return redirect()->route('cast.index')->with('success', 'Cast deleted successfully.');
    }
}
