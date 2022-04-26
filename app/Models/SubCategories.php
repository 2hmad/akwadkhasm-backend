<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategories extends Model
{
    use HasFactory;
    public $table = "subcategories";
    protected $fillable = [
        'id',
        'title_en',
        'title_ar',
        'cat_id'
    ];
    protected $hidden = [];
}
