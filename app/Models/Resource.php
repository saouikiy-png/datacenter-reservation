<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $fillable = [
        'name','category_id','responsable_id',
        'cpu','ram','storage','os','location','status'
    ];

    public function category() {
        return $this->belongsTo(ResourceCategory::class);
    }

    public function responsable() {
        return $this->belongsTo(User::class, 'responsable_id');
    }

    public function maintenances() {
        return $this->hasMany(Maintenance::class);
    }
}
