<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupons extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'title_en',
        'title_ar',
        'type',
        'coupon',
        'offer_link',
        'store',
        'date',
    ];
    protected $hidden = [];
    public function store()
    {
        return $this->belongsTo(Stores::class, 'store', 'id');
    }
}
