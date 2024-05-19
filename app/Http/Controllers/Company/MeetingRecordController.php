<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Hall;
use App\Models\MeetingRecord;
use Illuminate\Http\Request;

class MeetingRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = MeetingRecord::query()->where('user_id', auth()->user()->id)->orderBy('id', 'desc')->paginate(20);
        return view('company.meeting-record.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $halls = Hall::query()->where('user_id', auth()->user()->id)->get();
        return view('company.meeting-record.create', compact('halls'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'hall_id' => 'required',
            'date' => 'required',
            'note' => 'required'
        ], [
            'hall_id.required' => 'برجاء اختيار ادخال التاريخ ',
            'date.required' => 'برجاء ادخال ادخال التاريخ ',
            'note.required' => 'برجاء ادخال ادخال note '
        ]);

        $meetingRecord = new MeetingRecord();
        $meetingRecord->user_id = auth()->user()->id;
        $meetingRecord->hall_id = $request->hall_id;
        $meetingRecord->date = $request->date;
        $meetingRecord->note = $request->note;
        $meetingRecord->save();

        return redirect()->route('company.meeting-record.index')->with('success', 'تم اضافة السجل بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(MeetingRecord $meetingRecord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MeetingRecord $meetingRecord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MeetingRecord $meetingRecord)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MeetingRecord $meetingRecord)
    {
        //
    }
}
