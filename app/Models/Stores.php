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
        'title',
        'website',
        'pic'
    ];
    protected $hidden = [];
    public $timestamps = false;
}
