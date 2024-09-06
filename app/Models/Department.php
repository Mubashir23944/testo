<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['name', 'desc', 'location_id', 'created_by', 'updated_by', 'status'];

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'dept_id');
    }
}
