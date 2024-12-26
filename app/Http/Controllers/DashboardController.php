<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class DashboardController extends Controller
{
    public function index()
    {
        $films = Film::all();
        return view('partial.table.table', compact('films'));
    }
    public function indexLogin()
    {
        $films = Film::all();
        return view('partial.table.table', compact('films'));
    }


}
