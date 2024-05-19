<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hall;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function topTen(Request $request)
    {
        if ($request->val == null) {
            return back()->withErrors(['برجاء اختيار قيمة للبحث عنها']);
        }
        $items = Hall::query()->orderBy($request->val, 'desc')->take(10)->get();
        return view('admin.dashboard', compact('items'));
    }
}
