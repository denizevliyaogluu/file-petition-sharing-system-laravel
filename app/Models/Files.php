<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'city_id', 'date_time', 'location', 'user_id', 'sitting_plan'];

    public function getAdmins()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function getCategory()
    {
        return $this->belongsTo(FileCategories::class, 'category_id');
    }
}
