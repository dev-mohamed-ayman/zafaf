<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Hall;
use App\Models\User;
use Illuminate\Http\Request;

class AnlysisController extends Controller
{
    public function index()
    {
        $halls = Hall::query()->where('user_id', auth()->user()->id)->get();
        $hallDetails = [];
        return view('company.analysis.index', compact('halls', 'hallDetails'));
    }

    public function details(Request $request)
    {
        if ($request->hall == 'all') {
            $hallDetails = Hall::query()->where('user_id', auth()->user()->id)->get();
        } else {
            $hallDetails = Hall::query()->where('id', $request->hall)->get();
        }
        if ($request->search) {
            $hallDetails = HAll::query()->where('user_id', auth()->user()->id)->where('name', 'Like', '%' . $request->search . '%')->get();
        }
        $halls = Hall::query()->where('user_id', auth()->user()->id)->get();
        return view('company.analysis.index', compact('hallDetails', 'halls'));
    }
}
