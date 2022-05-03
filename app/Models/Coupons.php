<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupons extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'title',
        'type',
        'coupon',
        'offer_link',
        'store',
        'category_id',
        'subcategory_id',
        'date',
    ];
    protected $hidden = [];
    public $timestamps = false;
    public function store()
    {
        return $this->belongsTo(Stores::class, 'store', 'id');
    }
}
