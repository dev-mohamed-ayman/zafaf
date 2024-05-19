<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = City::query()->orderBy('id', 'desc')->paginate(10);
        return view('admin.city.index', compact('items'));
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
        $request->validate([
            'country' => 'required',
            'title_ar' => 'required',
            'title_en' => 'required'
        ], [
            'country.required' => 'برجاء اختيار دولة',
            'title_ar.required' => 'برجاء ادخال اسم المدينة بالعربي',
            'title_en.required' => 'برجاء ادخال اسم المدينة بالانجليزي'
        ]);

        City::query()->create([
            'country' => $request->country,
            'title_ar' => $request->title_ar,
            'title_en' => $request->title_en,
        ]);
        return back()->with('success', 'تم اضافه المدينة بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(City $city)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, City $city)
    {
        $request->validate([
            'country' => 'required',
            'title_ar' => 'required',
            'title_en' => 'required'
        ], [
            'country.required' => 'برجاء اختيار دولة',
            'title_ar.required' => 'برجاء ادخال اسم المدينة بالعربي',
            'title_en.required' => 'برجاء ادخال اسم المدينة بالانجليزي'
        ]);

        $city->update([
            'country' => $request->country,
            'title_ar' => $request->title_ar,
            'title_en' => $request->title_en,
        ]);
        return back()->with('success', 'تم تعديل المدينة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        $city->delete();
        return back()->with('success', 'تم حذف المدينة بنجاح');
    }
}
