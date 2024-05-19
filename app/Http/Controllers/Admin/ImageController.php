<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            'image' => 'required'
        ], [
            'image.required' => 'برجاء اضافه صورة'
        ]);


        $image = new Image();
        if ($request->hall_id) {
            $image->hall_id = $request->hall_id;
        }elseif ($request->album_id) {
            $image->album_id = $request->album_id;
        }
        $image->path = uploadFile('uploads/halls', $request->file('image'));
        $image->save();

        return back()->with('success', 'تم اضافه الصورة بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show($hall_id)
    {
        $items = Image::query()->orderBy('order', 'asc')->where('hall_id', $hall_id)->paginate(15);
        return view('admin.image.index', compact('items', 'hall_id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Image $image)
    {
        $image->order = $request->order;
        $image->update();
        return back()->with('success', 'تم تعديل الصورة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Image $image)
    {
        deleteFile($image->path);
        $image->delete();
        return back()->with('success', 'تم حذف الصورة بنجاح');
    }
}
