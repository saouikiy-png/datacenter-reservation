<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'resource_id',
        'reservation_date',
        'return_date',
        'justification',
        'status',
        'manager_comment'
    ];

    // Relation avec User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation avec Resource
    public function resource()
    {
        return $this->belongsTo(Resource::class);
    }
}
?>