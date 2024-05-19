<?php

namespace App\Http\Controllers;

use App\Models\Hall;
use App\Models\Rate;
use Illuminate\Http\Request;

class RateController extends Controller
{
    public function rate(Hall $hall, Request $request)
    {
        $request->validate([
            'comment' => 'required'
        ], [
            'comment.required' => 'برجاء ادخال تعليق'
        ]);
        Rate::query()->updateOrCreate([
            'user_id' => auth()->user()->id,
            'hall_id' => $hall->id,
            'rate' => $request->rate,
            'comment' => $request->comment
        ]);

        return back()->with('success', 'تم التقييم بنجاح');
    }
}
