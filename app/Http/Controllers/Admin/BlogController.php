<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Blog::query()->orderBy('id', 'desc')->paginate(20);
        return view('admin.blog.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required',
            'content' => 'required'
        ], [
            'title.required' => 'برجاء ادخال عنوان',
            'image.required' => 'برجاء ادخال صورة',
            'content.required' => 'برجاء ادخال محتوي'
        ]);

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->image = uploadFile('uploads', $request->file('image'));
        $blog->save();

        return redirect()->route('admin.blog.index')->with('success', 'تم اضافة المقالة بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('admin.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required',
            'content' => 'required'
        ], [
            'title.required' => 'برجاء ادخال عنوان',
            'image.required' => 'برجاء ادخال صورة',
            'content.required' => 'برجاء ادخال محتوي'
        ]);

        $blog->title = $request->title;
        $blog->content = $request->content;
        if ($request->hasFile('image')) {
            deleteFile($blog->image);
            $blog->image = uploadFile('uploads', $request->file('image'));
        }
        $blog->update();

        return redirect()->route('admin.blog.index')->with('success', 'تم تعديل المقالة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        deleteFile($blog->image);
        $blog->delete();
        return redirect()->route('admin.blog.index')->with('success', 'تم حذف المقالة بنجاح');
    }
}
