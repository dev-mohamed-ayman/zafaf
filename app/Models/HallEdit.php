<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HallEdit extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'actions' => 'array'
    ];

    public function hall() {
        return $this->belongsTo(Hall::class, 'hall_id', 'id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
