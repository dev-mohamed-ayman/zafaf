<?php

namespace App\Http\Controllers\Company;

use App\Models\Hall;
use App\Models\HallEdit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HallRequest;
use App\Models\City;
use App\Models\Image;
use Illuminate\Support\Facades\DB;

class HallController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Hall::query()->where('user_id', auth()->user()->id)->orderBy('id', 'desc')->paginate(15);
        return view('company.hall.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = City::all();
        return view('company.hall.create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HallRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->except('images', '_token', 'orders');
            $data['user_id'] = auth()->user()->id;
            $hall = Hall::query()->create($data);
            if ($request->images) {
                foreach ($request->images as $index => $file) {
                    $image = new Image();
                    $image->path = uploadFile('uploads/halls', $file);
                    $image->hall_id = $hall->id;
                    $image->order = $request->orders[$index];
                    $image->save();
                }
            }
            DB::commit();
            return redirect()->route('company.hall.index')->with('success', 'تم اضافة القاعه بنجاح');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Hall $hall)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hall $hall)
    {
        $cities = City::all();
        return view('company.hall.edit', compact('cities', 'hall'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hall $hall)
    {
        $data = $request->except('images', '_token', '_method');
        $hall->update($data);
        $hallEdit = new HallEdit();
        $hallEdit->user_id = auth()->user()->id;
        $hallEdit->hall_id = $hall->id;
        $hallEdit->save();
        return redirect()->route('company.hall.index')->with('success', 'تم تعديل القاعه بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hall $hall)
    {
        if (!empty($hall->images)) {
            foreach ($hall->images as $image) {
                deleteFile($image->path);
            }
        }
        $hall->delete();
        return redirect()->route('company.hall.index')->with('success', 'تم حذف القاعه بنجاح');
    }
}
