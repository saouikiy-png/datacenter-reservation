<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Resource;

class Reservation extends Model
{
    protected $fillable = [
        'user_id',
        'resource_id',
        'reservation_date',
        'return_date',
        'status',
        'justification',
        'manager_comment',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function resource()
    {
        return $this->belongsTo(Resource::class);
    }
}
