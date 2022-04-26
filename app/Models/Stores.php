<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stores extends Model
{
    use HasFactory;
    public $table = "stores";
    protected $fillable = [
        'id',
        'title_en',
        'title_ar',
        'website',
        'pic'
    ];
    protected $hidden = [];
}
