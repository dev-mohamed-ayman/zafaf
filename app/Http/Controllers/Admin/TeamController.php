<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
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
            'name' => 'required',
            'job' => 'required',
            'whatsapp' => 'required',
        ]);

        $team = new Team();
        $team->hall_id = $request->hall_id;
        $team->name = $request->name;
        $team->job = $request->job;
        $team->whatsapp = $request->whatsapp;
        $team->save();

        return back()->with('success', 'تم الاضافة بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $items = Team::query()->where('hall_id', $id)->orderBy('id', 'desc')->paginate(15);
        return view('admin.team.index', compact('items', 'id'));
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
    public function update(Request $request, Team $team)
    {
        $request->validate([
            'name' => 'required',
            'job' => 'required',
            'whatsapp' => 'required',
        ]);

        $team->name = $request->name;
        $team->job = $request->job;
        $team->whatsapp = $request->whatsapp;
        $team->update();

        return back()->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        $team->delete();
        return back()->with('success', 'تم التعديل بنجاح');
    }
}
