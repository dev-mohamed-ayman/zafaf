<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hall;
use App\Models\Offer;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Offer::query()->paginate(15);
        return view('admin.offer.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $halls = Hall::all();
        return view('admin.offer.create', compact('halls'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'hall_id' => 'required',
            'content_ar' => 'required',
            'content_en' => 'required',
            'image' => 'required'
        ], [
            'date.required' => 'برجاء اضافة تاريخ',
            'hall_id.required' => 'برجاء اختيار عرض',
            'content_ar.required' => 'برجاء اضافة محتوي بالعربي',
            'content_en.required' => 'برجاء اضافة محتوي بالانجليزي',
            'image.required' => 'برجاء ادخال صورة'
        ]);
        $offer = new Offer();
        $offer->date = $request->date;
        $offer->hall_id = $request->hall_id;
        $offer->content_ar = $request->content_ar;
        $offer->content_en = $request->content_en;
        $offer->image = uploadFile('uploads/offers', $request->file('image'));
        $offer->save();

        return redirect()->route('admin.offer.index')->with('success', 'تم اضافة العرض بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Offer $offer)
    {
        $halls = Hall::all();
        return view('admin.offer.edit', compact('halls', 'offer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Offer $offer)
    {
        $request->validate([
            'date' => 'required',
            'hall_id' => 'required',
            'content_ar' => 'required',
            'content_en' => 'required'
        ], [
            'date.required' => 'برجاء اضافة تاريخ',
            'hall_id.required' => 'برجاء اختيار عرض',
            'content_ar.required' => 'برجاء اضافة محتوي بالعربي',
            'content_en.required' => 'برجاء اضافة محتوي بالانجليزي'
        ]);
        $offer->date = $request->date;
        $offer->hall_id = $request->hall_id;
        $offer->content_ar = $request->content_ar;
        $offer->content_en = $request->content_en;
        if ($request->hasFile('image')) {
            deleteFile($offer->image);
            $offer->image = uploadFile('uploads/offers', $request->file('image'));
        }
        $offer->save();

        return redirect()->route('admin.offer.index')->with('success', 'تم تعديل العرض بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Offer $offer)
    {
        deleteFile($offer->image);
        $offer->delete();
        return redirect()->route('admin.offer.index')->with('success', 'تم حذف العرض بنجاح');
    }
}
