<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $fillable = [
        'name',
        'category_id',
        'cpu',
        'ram',
        'storage',
        'bandwidth',
        'os',
        'location',
        'status'
    ];

    public function category()
    {
        return $this->belongsTo(ResourceCategory::class);
    }

    public function maintenances()
    {
        return $this->hasMany(Maintenance::class);
    }
}

