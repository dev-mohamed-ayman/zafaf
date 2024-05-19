<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hall;
use App\Models\User;
use Illuminate\Http\Request;

class AnlysisController extends Controller
{
    public function index()
    {
        $users = User::query()->where('role', 'company')->orWhere('role', 'admin')->get();
        $hallTopTen = Hall::query()->orderBy('visits', 'desc')->orderBy('slide_images', 'desc')->orderBy('show_phone', 'desc')->limit('10')->get();
        return view('admin.analysis.index', compact('users', 'hallTopTen'));
    }

    public function getHalls($user_id)
    {
        $halls = Hall::query()->with('orders')->where('user_id', $user_id)->get();

        return response()->json($halls);
    }

    public function details(Request $request)
    {
        if ($request->hall == 'all') {
            $hall = Hall::query()->with('orders')->where('user_id', $request->user)->get();
        } else {
            $hall = Hall::query()->with('orders')->where('id', $request->hall)->get();
        }

        $hallTopTen = Hall::query()->orderBy('visits', 'desc')->orderBy('slide_images', 'desc')->orderBy('show_phone', 'desc')->limit('10')->get();


        if ($request->search) {
            $hall = HAll::query()->with('orders')->where('name', 'Like', '%' . $request->search . '%')->get();
        }

        if ($request->start_date) {
            $hall = HAll::query()
                ->with('orders')
                ->where('created_at', '>=', $request->start_date)
                ->where('created_at', '<=', $request->end_date)
                ->get();
        }
        $users = User::query()->where('role', 'company')->orWhere('role', 'admin')->get();
        return view('admin.analysis.index', compact('users', 'hall', 'hallTopTen'));
    }
}
