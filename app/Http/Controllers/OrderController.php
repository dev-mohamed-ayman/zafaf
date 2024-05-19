<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
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
            'email' => 'required|unique:orders,email',
            'phone' => 'required|unique:orders,phone',
            'date' => 'required',
            'count' => 'required',
            'price' => 'required',
            'note' => 'required',
        ], [
            'name.required' => 'برجاء ادخال الاسم',
            'email.required' => 'برجاء ادخال البريد الالكتروني',
            'phone.required' => 'برجاء ادخال رقم الهاتف',
            'date.required' => 'برجاء ادخال التاريخ',
            'count.required' => 'برجاء ادخال عدد المدعوين',
            'price.required' => 'برجاء ادخال السعر',
            'note.required' => 'برجاء ادخال رسالة',
            'email.unique' => 'لايمكن اطلب سعر اكتر من مره بنفس البريد الالكتروني',
            'phone.unique' => 'لايمكن اطلب سعر اكتر من مره بنفس الهاتف',
        ]);


        $order = new Order();
        $order->name = $request->name;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->date = $request->date;
        $order->count = $request->count;
        $order->price = $request->price;
        $order->note = $request->note;
        $order->hall_id = $request->hall_id;
        $order->save();
        return redirect()->back()->with('success', 'تم ارسال الطلب بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
