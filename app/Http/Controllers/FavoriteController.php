<?php

namespace App\Http\Controllers;

use App\Models\Hall;
use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $favorites = Favorite::query()->where('user_id', auth()->user()->id)->pluck('hall_id');
        $halls = Hall::query()->whereIn('id', $favorites)->with('images', 'city', 'offers')->get();
        return view('frontend.favorite', compact('halls'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Favorite::query()->updateOrCreate([
            'user_id' => auth()->user()->id,
            'hall_id' => $request->hall_id,
        ], [
            'user_id' => auth()->user()->id,
            'hall_id' => $request->hall_id,
        ]);
        return back()->with('success', 'تم اضافه القاعه الي المفضله');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        Favorite::query()->updateOrCreate([
            'user_id' => auth()->user()->id,
            'hall_id' => $id,
        ], [
            'user_id' => auth()->user()->id,
            'hall_id' => $id,
        ]);
        return back()->with('success', 'تم اضافه القاعه الي المفضله');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Favorite $favorite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Favorite $favorite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Favorite::query()->where('hall_id', $id)->delete();
        return back()->with('success', 'تم حذف القاعه الي المفضله');
    }
}
