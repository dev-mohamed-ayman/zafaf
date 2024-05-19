<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Image;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Album::query()->orderBy('id', 'desc')->paginate(20);
        return view('admin.album.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.album.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'images' => 'required',
            'content' => 'required',
            'hall_id' => 'required',
        ], [
            'title.required' => 'برجاء ادخال عنوان',
            'image.required' => 'برجاء ادخال صورة',
            'content.required' => 'برجاء ادخال محتوي',
            'hall_id.required' => 'برجاء اختيار قاعه',
        ]);
        $album = new Album();
        $album->title = $request->title;
        $album->hall_id = $request->hall_id;
        $album->content = $request->content;
        $album->save();

        if ($request->images) {
            foreach ($request->images as $file) {
                $image = new Image();
                $image->path = uploadFile('uploads/albums', $file);
                $image->album_id = $album->id;
                $image->save();
            }
        }

        return redirect()->route('admin.album.index')->with('success', 'نم اضافه الالبوم بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album)
    {
        $items = Image::query()->where('album_id', $album->id)->paginate(15);
        return view('admin.image.index', compact('items', 'album'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $album)
    {
        return view('admin.album.edit', compact('album'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Album $album)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'hall_id' => 'required',
        ], [
            'title.required' => 'برجاء ادخال عنوان',
            'content.required' => 'برجاء ادخال محتوي',
            'hall_id.required' => 'برجاء اختيار قاعه',
        ]);
        $album->title = $request->title;
        $album->hall_id = $request->hall_id;
        $album->content = $request->content;
        if ($request->hasFile('image')) {
            deleteFile($album->inage);
            $album->image = uploadFile('uploads/albums', $request->file('image'));
        }
        $album->save();

        return redirect()->route('admin.album.index')->with('success', 'نم تعديل الالبوم بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {
        deleteFile($album->image);
        $album->delete();
        return redirect()->route('admin.album.index')->with('success', 'نم حذف الالبوم بنجاح');
    }
}
