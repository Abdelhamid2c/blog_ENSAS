<?php

namespace App\Models\posts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categpries';

    protected $fillable = [
        "id",
        "name",
        "created_at",
    ];
}
