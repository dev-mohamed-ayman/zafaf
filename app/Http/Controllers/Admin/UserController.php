<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = User::query()->orderBy('id', 'desc')->paginate(10);
        $roles = Role::all();
        return view('admin.user.index', compact('items', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = City::all();
        $roles = Role::all();
        return view('admin.user.create', compact('cities', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|unique:users,phone',
            'email' => 'required|unique:users,email',
            'city_id' => 'required',
            'password' => 'required|confirmed',
        ], [
            'name.required' => 'برجاء ادخال الاسم',
            'phone.required' => 'برجاء ادخال رقم الهاتف',
            'phone.unique' => 'هذا الهاتف مستخدم من قبل',
            'email.required' => 'برجاء ادخال البريد الالكتروني',
            'email.unique' => 'هذا البريد مستخدم من قبل',
            'city_id.required' => 'برجاء اختيار مدينة',
            'password.required' => 'برجاء ادخال كلمة مرور',
            'password.confirmed' => 'برجاء تاكيد كلمة المرور',
        ]);
        $user = User::query()->create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'city_id' => $request->city_id,
            'password' => bcrypt($request->password)
        ]);
        if ($request->role) {
            $user->role = 'admin';
            $user->update();
            $user->assignRole($request->role);
        }
        return redirect()->route('admin.user.index')->with('success', 'تم اضافة المستخدم بنجاح');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $id,
            'phone' => 'required|unique:users,phone,' . $id,
            'password' => 'nullable|confirmed',
        ], [
            'name.required' => 'برجاء ادخال اسم المستخدم',
            'email.required' => 'برجاء ادخال البريد الالكتروني',
            'email.unique' => 'هذا البريد مستخدم من قبل',
            'phone.required' => 'برجاء ادخال الهاتف',
            'phone.unique' => 'هذا الهاتف مستخدم من قبل',
            'password.confirmed' => 'برجاء التاكد من كلمه المرور',
        ]);
        $user = User::query()->where('id', $id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->update();

        if ($request->role) {
            $user->role = 'admin';
            $user->update();
            $user->syncRoles([$request->role]);
        }
        return back()->with('success', 'تم تعديل بيانات المستخدم بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
        return back()->with('success', 'تم حذف المستخدم بنجاح');
    }
}
