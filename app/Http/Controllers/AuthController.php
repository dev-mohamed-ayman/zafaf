<?php

namespace App\Http\Controllers;

use App\Http\Requests\Frontend\LoginRequest;
use App\Http\Requests\Frontend\RegisterRequest;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return redirect()->back()->withErrors('برجاء تسجيل الدخول');
    }

    public function postLogin(LoginRequest $request)
    {
        if (Auth::attempt($request->except('_token', 'ipinfo'))) {
            if (auth()->user()->status == '0') {
                auth()->logout();
                return back()->withErrors(['error', 'حسابك غير مفعل']);
            }
            if (\auth()->user()->role == 'admin') {
                return redirect()->route('admin.index')->with('success', 'تم تسجيلل الدخول بنجاح');
            }
            if (\auth()->user()->role == 'company') {
                return redirect()->route('company.index')->with('success', 'تم تسجيلل الدخول بنجاح');
            }
            return redirect('/')->with('success', 'تم تسجيلل الدخول بنجاح');
        };
        return back()->withErrors(['error', 'بيانات تسجيل الدخول غير صحيحة!']);
    }
    public function register()
    {
        $cities = City::all();
        return view('frontend.register', compact('cities'));
    }
    public function postRegister(RegisterRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->city_id = $request->city;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->back()->with('success', 'تم انشاء الحساب بنجاح');
    }

    public function registerCompany()
    {
        $cities = City::all();
        return view('frontend.register-company', compact('cities'));
    }
    public function postRegisterCompany(RegisterRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->city_id = $request->city;
        $user->role = 'company';
        $user->status = '0';
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('home')->with('success', 'تم ارسال طلب الحساب بنجاح');
    }
}
