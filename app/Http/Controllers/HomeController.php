<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Blog;
use App\Models\City;
use App\Models\Hall;
use App\Models\Offer;
use App\Models\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        $ip = $request->ip();
        $response = Http::get('https://ipinfo.io/' . $ip . '?token=e746e824ca028c');
        $data = json_decode($response->getBody());
//        dd(\session('country'));
        $halls = [];
        $hallIds = Hall::query()->where('country', \session('country'))->where('order', '2')->pluck('id');
        $offers = Offer::query()->whereIn('hall_id', $hallIds)->get();
        $cities = City::query()->where('country', session('country'))->get();
        $blogs = Blog::all();
        return view('frontend.home', compact('halls', 'cities', 'offers', 'blogs'));
    }

    public function blog($id)
    {
        $cities = City::query()->where('country', session('country'))->get();
        $blog = Blog::query()->findOrFail($id);
        return view('frontend.blog', compact('blog', 'cities'));
    }

    public function hallDetails($id)
    {
        $cities = City::query()->where('country', session('country'))->get();
        $hall = Hall::query()->with(['images' => function ($query) {
            $query->orderBy('order', 'asc');
        }])->findOrFail($id);
        $hall->update(['visits' => $hall->visits + 1]);
        $comments = Rate::query()->with('user')->where('hall_id', $hall->id)->where('status', '1')->get();
        return view('frontend.hall-details', compact('hall', 'comments', 'cities'));
    }

    public function search(Request $request)
    {
        $halls = Hall::query()
            ->where('country', \session('country'))
            ->where('name_ar', 'LIKE', '%' . $request->name . '%')
            ->where('name_en', 'LIKE', '%' . $request->name . '%')
            ->where('city_id', 'LIKE', '%' . $request->city . '%')
            ->where('type', 'LIKE', '%' . $request->type . '%')
            ->where('offer', 'LIKE', '%' . $request->offer . '%')
            ->orderBy('order', 'desc')
            ->with(['images' => function ($q) {
                $q->orderBy('order', 'asc');
            }])
            ->get();
        $hallIds = Hall::query()->where('order', '2')->pluck('id');
        $offers = Offer::query()->whereIn('hall_id', $hallIds)->get();
        $cities = City::query()->where('country', session('country'))->get();
        $blogs = Blog::all();
        return view('frontend.halls', compact('halls', 'cities', 'offers', 'blogs'));
    }

    public function offer()
    {
        $cities = City::query()->where('country', session('country'))->get();
        $offers = Offer::query()->orderBy('id', 'desc')->get();
        return view('frontend.offer', compact('offers', 'cities'));
    }

    public function hallPlan()
    {
        return view('frontend.hall-plan');
    }

    public function albums()
    {
        $albums = Album::query()->with('images')->orderBy('id', 'desc')->get();
        return view('frontend.albums', compact('albums'));
    }

    public function showPhone(Hall $hall)
    {
        $hall->show_phone = $hall->show_phone + 1;
        $hall->update();
    }

    public function slideImages(Hall $hall)
    {
        $hall->slide_images = $hall->slide_images + 1;
        $hall->update();
    }
}
