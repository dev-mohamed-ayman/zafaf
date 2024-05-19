<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HallEdit;
use Illuminate\Http\Request;

class HallEditController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = HallEdit::query()->orderBy('id', 'desc')->paginate('25');
        return view('admin.hall-edit.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if ($request->hall == 'all') {
            $items = HallEdit::query()->orderBy('id', 'desc')->paginate('25');
        } else {
            $items = HallEdit::query()->where('hall_id', $request->hall)->paginate('25');
        }
        return view('admin.hall-edit.index', compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
        $items = HallEdit::query()
            ->orderBy('id', 'desc')
            ->where('created_at', '>=', $request->start_date)
            ->where('created_at', '<=', $request->end_date)
            ->paginate('25');
        return view('admin.hall-edit.index', compact('items'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, Request $request)
    {
        if ($request->user == 'all') {
            $items = HallEdit::query()->orderBy('id', 'desc')->paginate('25');
        } else {
            $items = HallEdit::query()->where('user_id', $request->user)->paginate('25');
        }
        return view('admin.hall-edit.index', compact('items'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $items = HallEdit::query()
            ->where('hall_id', $id)
            ->orderBy('id', 'desc')
            ->paginate('25');
        return view('admin.hall-edit.index', compact('items'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
