<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $fillable = [
        'resource_id',
        'description',
        'start_date',
        'end_date',
        'status'
    ];

    public function resource()
    {
        return $this->belongsTo(Resource::class);
    }
}

