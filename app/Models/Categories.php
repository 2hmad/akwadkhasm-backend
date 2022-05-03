<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    public $table = "categories";
    protected $fillable = [
        'id',
        'title',
    ];
    protected $hidden = [];
    public $timestamps = false;
    public function subcategory()
    {
        return $this->hasMany(SubCategories::class, 'cat_id');
    }
}
