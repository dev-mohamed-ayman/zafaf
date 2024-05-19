<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Hall;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('company.dashboard');
    }

    public function topTen(Request $request)
    {
        if ($request->val == null) {
            return back()->withErrors(['برجاء اختيار قيمة للبحث عنها']);
        }
        $items = Hall::query()->where('user_id', auth()->user()->id)->orderBy($request->val, 'desc')->take(10)->get();
        return view('company.dashboard', compact('items'));
    }
}
