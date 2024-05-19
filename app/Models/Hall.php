<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function teams()
    {
        return $this->hasMany(Team::class, 'hall_id', 'id');
    }

    public function hotelDetails()
    {
        return $this->hasOne(HotelDetails::class, 'hall_id', 'id');
    }

    public function hallDetails()
    {
        return $this->hasOne(HallDetails::class, 'hall_id', 'id');
    }

    public function name()
    {
        if (app()->getLocale() == 'ar') {
            return $this->name_ar;
        } else {
            return $this->name_en;
        }
    }

    public function description()
    {
        if (app()->getLocale() == 'ar') {
            return $this->description_ar;
        } else {
            return $this->description_en;
        }
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'hall_id', 'id');
    }

    public function offers()
    {
        return $this->hasMany(Offer::class, 'hall_id', 'id');
    }

    public function rates()
    {
        return $this->hasMany(Rate::class, 'hall_id', 'id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'hall_id', 'id');
    }
}
